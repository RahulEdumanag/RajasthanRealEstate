<?php

namespace App\Exceptions;
use App\Models\Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class Handler extends ExceptionHandler
{
    protected $dontReport = [];

    protected $dontFlash = ['password', 'password_confirmation'];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
    //   $clientId = env('WEB_ID');
    //   if ($exception instanceof \ErrorException || $exception instanceof QueryException) {
    //      $error = new Error();
    //      $error->Error_Reg_Id = getSelectedValue() ?: $clientId;
    //      $error->Error_Message = $exception->getMessage();
    //      $error->Error_CreatedDate = Carbon::now('Asia/Kolkata');
    //      $error->Error_CreatedBy = Auth::check() ? Auth::user()->Log_Id : null;
    //      $error->save();

    //      return redirect('/error');
    //   }

        return parent::render($request, $exception);
    }
}
