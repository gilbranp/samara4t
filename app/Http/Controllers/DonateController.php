<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(MidtransService $midtransService)
    {
        $this->midtrans = $midtransService;
    }

    public function index()
    {
        return view('frontend.donate.donate');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input dengan pesan dalam Bahasa Indonesia
        $validateData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'donation_type' => 'required',
            'amount' => 'nullable|integer',
            'item_qty' => 'nullable|integer',
            'expired_date' => 'nullable|date',
            'donation_option' => 'nullable',
            'resi_number' => 'nullable',
            'jasa_distribusi' => 'nullable',
            'payment_option' => 'nullable',
            'message' => 'nullable|string',
            'transfer_receipt' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'required' => ':attribute wajib diisi.',
            'integer' => ':attribute harus berupa angka.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berupa file dengan tipe: :values.',
            'string' => ':attribute harus berupa string.',
        ]);

        // Proses unggah foto bukti transfer jika ada
        if ($request->hasFile('transfer_receipt')) {
            $fileName = time() . '.' . $request->transfer_receipt->extension();
            $path = $request->transfer_receipt->storeAs('assets/img/transfer_receipts', $fileName, 'public'); // Simpan di storage/app/public/transfer_receipts
            $validateData['transfer_receipt'] = $path; // Simpan path foto
        }

        // Menambahkan status default
        $validateData['status'] = 'pending';


        // Membuat entri donasi baru
        try {
            DB::beginTransaction();
            $donateSave = Donate::create($validateData);

            if ($request->donation_type === 'uang' && $request->payment_option === 'otomatis') {
                $transactionDetails = [
                    'order_id' => 'DONATE-' . $request->name . '-' . time(),
                    'gross_amount' => $request->amount,
                ];

                $customerDetails = [
                    'first_name' => $request->name,
                    'phone' => $request->phone,
                ];

                $transactionData = [
                    'transaction_details' => $transactionDetails,
                    'customer_details' => $customerDetails,
                ];

                // Kirim data transaksi ke Midtrans
                $transaction = $this->midtrans->createTransaction($transactionData);

                // Jika transaksi berhasil, update status menjadi success
                $donateSave->update(['status' => 'sukses']);

                // Commit transaksi database setelah semua berhasil
                DB::commit();

                // Redirect ke halaman pembayaran Midtrans
                return redirect($transaction->redirect_url);
            }
            $donateSave->update(['status' => 'sukses']);
            // Commit transaksi database setelah semua berhasil
            DB::commit();
            // Redirect dengan pesan sukses
            return redirect(route('donate.index'))->with('success', 'Anda telah melakukan donasi,status donasi sekarang pending');
        } catch (\Exception $e) {
            DB::rollBack();

            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateStatus($id, $status)
    {
        $donate = Donate::findOrFail($id);
        $donate->status = $status; // Set status sesuai parameter (sukses atau ditolak)
        $donate->save();

        return redirect()->route('listdonate.index')->with('success', 'Status donasi berhasil diperbarui');
    }
}