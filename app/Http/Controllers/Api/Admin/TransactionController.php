<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\QRImageWithLogo;
use App\Http\Requests\Transaction\StoreTransactionRequest;
use App\Http\Requests\Transaction\UpdateTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\DonorTransactionResource;
use App\Models\Transaction;
use App\Services\TransactionService;
use App\Traits\FileUpload;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    use FileUpload;
    private TransactionService $transactionService;
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
        $this->middleware(['auth:sanctum']);
    }
    public function index(): JsonResponse
    {

        $data=$this->transactionService->index();
        return $this->showAll($data['Transaction'],TransactionResource::class,$data['message']);

    }

    public function show(Transaction $transaction): JsonResponse
    {

        return $this->showOne($transaction,TransactionResource::class);

    }
    public function store(StoreTransactionRequest $request): JsonResponse
    {
        $dataItem=$request->validated();
        $transactionData=null;
        if ($request->hasFile('waybill_img')) {
            $file = $request->file('waybill_img');
            $fileName ='Transaction/'.'waybill_Images/' . $file->hashName() ;
            $imagePath = $this->createFile($request->file('waybill_img'), Transaction::getDisk(),filename:  $fileName);
            $dataItem['waybill_img'] = $imagePath;
            $transactionData=$this->transactionService->create($dataItem);
        }
//        if ($request->hasFile('qr')) {
//            $file = $request->file('qr');
//            $fileName = 'Transaction/'.'qr_code/' .  $file->hashName();
//            $imagePath = $this->createFile($request->file('qr'), Transaction::getDisk(), $fileName);
//            $table_data['qr'] = $imagePath;
//        } else {
//            $data = 'http://127.0.0.1:8000/api/transactions/'.$transactionData['Transaction']['id'] ;  // الرابط يلي لح يكون جوا qr
//            $logoPath = Storage::disk('assets')->path('logo.png');
//            $options = new QROptions();
//            $options->version = 5;
//            $options->outputBase64 = false;
//            $options->scale = 6;
//            $options->imageTransparent = false;
//            $options->drawCircularModules = true;
//            $options->circleRadius = 0.45;
//            $options->keepAsSquare = [
//                QRMatrix::M_FINDER,
//                QRMatrix::M_FINDER_DOT,
//            ];
//            $options->eccLevel = EccLevel::H;
//            $options->addLogoSpace = true;
//            $options->logoSpaceWidth = 13;
//            $options->logoSpaceHeight = 13;
//            $qrcode = new QRCode($options);
//            $qrOutputInterface = new QRImageWithLogo($options, $qrcode->getQRMatrix());
//            $imageData = $qrOutputInterface->dump(null, $logoPath);
//            $qrcode->render($data);
//            $fileName = 'qr_code_' . time() . '.png';
//            $imagePath = 'Transaction/'.'qr_code/'  . $fileName;
//            Storage::disk('transactions')->put($imagePath, $imageData);
//            $table_data['qr'] = $imagePath;
//        }

        return $this->showOne($transactionData['Transaction'],TransactionResource::class,$transactionData['message']);

    }

    public function update(UpdateTransactionRequest $request,Transaction $transaction): JsonResponse
    {
        $dataItem=$request->validated();
        if ($request->hasFile('waybill_img')) {
            $file = $request->file('waybill_img');
            $name ='Transaction/'.'waybill_Images/' . $file->hashName() ;
            $imagePath = $this->createFile($request->file('waybill_img'), Transaction::getDisk(),filename:  $name);
            $dataItem['waybill_img'] = $imagePath;
        }
        $data = $this->transactionService->update($dataItem, $transaction);
        return $this->showOne($data['Transaction'],TransactionResource::class,$data['message']);

    }


    public function destroy(Transaction $transaction)
    {
        $data = $this->transactionService->destroy($transaction);
        return [$data['message'],$data['code']];

    }

    public function showDeleted(): JsonResponse
    {
        $data=$this->transactionService->showDeleted();
        return $this->showAll($data['Transaction'],TransactionResource::class,$data['message']);
    }
    public function restore(Request $request){
        
        $data = $this->transactionService->restore($request);
        return [$data['message'],$data['code']];
    }

    public function showDonor()
    {
        $data = $this->transactionService->showDonor(Auth::user()->id);
        return $this->showAll($data['Transaction'],DonorTransactionResource::class,$data['message']);
    }

}
