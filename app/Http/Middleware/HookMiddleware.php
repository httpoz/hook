<?php
    
    namespace HttpOz\Hook\Http\Middleware;
    
    use Closure;
    use HttpOz\Hook\Models\Hook;
    
    class HookMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \Closure $next
         *
         * @throws
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            $hook = Hook::find($request->segment(2));
            
            if ($hook && $hook->is_active) {
                return $next($request);
            }
            abort(401, 'Not authorized');
        }
    }
