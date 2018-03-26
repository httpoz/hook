<?php
    
    namespace HttpOz\Hook\Tests\Feature;
    
    use HttpOz\Hook\Http\Middleware\ValidateHookMiddleware;
    use HttpOz\Hook\Models\Hook;
    use HttpOz\Hook\Tests\TestCase;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Illuminate\Support\Facades\Request;
    use Symfony\Component\HttpKernel\Exception\HttpException;

    class HookMiddlewareTest extends TestCase
    {
        use DatabaseMigrations;
        
        public function testHookSuccessPerfectParams()
        {
            $hook = factory(Hook::class)->create(['is_active' => true]);
            
            $request = Request::create("/hooks/{$hook->id}");
            $middleware = new ValidateHookMiddleware();
            
            $response = $middleware->handle($request, function () {});
            
            $this->assertNull($response);
        }
        
        public function testHookFailNotActive()
        {
    
            $this->expectException(HttpException::class);
            $this->withoutExceptionHandling();
            $hook = factory(Hook::class)->create(['is_active' => false]);
            
            $request = Request::create("/hooks/{$hook->id}");
            $middleware = new ValidateHookMiddleware();
            
            $response = $middleware->handle($request, function () {});
            $this->assertNotNull($response);
            $this->assertHtt(401, $response->getStatusCode());
        }
    }