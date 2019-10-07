<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckRank
{
    /**
     * Проверка ранга.
     *
     * @param Request $request
     * @param Closure $next
     * @param int $rank
     * @return mixed
     */
    public function handle(Request $request, Closure $next, int $rank = 0)
    {
        if (is_null(Auth::user()) || Auth::user()->rank < $rank) {
            return new Response('Ваш ранг не позволяет смотреть эту страницу.');
        }

        return $next($request);
    }
}