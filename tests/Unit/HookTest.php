<?php
    
    namespace HttpOz\Hook\Tests\Unit;
    
    use HttpOz\Hook\Models\Hook;
    use HttpOz\Hook\Tests\TestCase;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    
    class HookTest extends TestCase
    {
        use DatabaseMigrations;
        
        public function testHookCanBeCreated()
        {
            $createdHook = factory(Hook::class)->create();
            
            $hook = Hook::first();
            
            $this->assertSame($createdHook->id, $hook->id);
            $this->assertEquals(36, strlen($hook->id));
            $this->assertInternalType('bool', $hook->is_active);
        }
    }