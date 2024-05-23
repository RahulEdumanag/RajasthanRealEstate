<?php
namespace App\Exceptions;
use App\Models\Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
 use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use BadMethodCallException;

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
    // $clientId = env('WEB_ID');
    // if ($exception instanceof \ErrorException || 
    //     $exception instanceof QueryException ||
    //     $exception instanceof BadMethodCallException ||
    //     $exception instanceof NotFoundHttpException ||
    //     $exception instanceof MethodNotAllowedHttpException
    // ) {
    //     $error = new Error();
    //     $error->Error_Reg_Id = getSelectedValue() ?: $clientId;
    //     $error->Error_Message = $exception->getMessage();
    //     $error->Error_CreatedDate = Carbon::now('Asia/Kolkata');
    //     $error->Error_CreatedBy = Auth::check() ? Auth::user()->Log_Id : null;
    //     $error->save();
    //     return redirect('/error');
    // }
    // return parent::render($request, $exception);
}
}
