<?php
use Aedart\Config\Loader\Providers\ConfigurationLoaderServiceProvider;
use Aedart\Testing\Laravel\TestCases\unit\UnitWithLaravelTestCase;
use Aedart\Config\Loader\Traits\ConfigLoaderTrait;
use Aedart\Config\Loader\Contracts\Loaders\ConfigLoader;

/**
 * Class ConfigLoaderTraitTest
 *
 * @group traits
 * @coversDefaultClass Aedart\Config\Loader\Traits\ConfigLoaderTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ConfigLoaderTraitTest extends UnitWithLaravelTestCase{

    protected function getPackageProviders($app)
    {
        return [
            ConfigurationLoaderServiceProvider::class
        ];
    }

    /************************************************
     * Helpers
     ***********************************************/

    /**
     * Get the trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|ConfigLoaderTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(ConfigLoaderTrait::class);
    }

    /************************************************
     * Actual tests
     ***********************************************/

    /**
     * @test
     * @covers ::getConfigLoader
     * @covers ::hasConfigLoader
     * @covers ::hasDefaultConfigLoader
     * @covers ::setConfigLoader
     * @covers ::getDefaultConfigLoader
     *
     * @covers Aedart\Config\Loader\Facades\ConfigLoader::getFacadeAccessor
     * @covers Aedart\Config\Loader\Providers\ConfigurationLoaderServiceProvider::register
     */
    public function canObtainDefaultConfigLoader() {
        $trait = $this->getTraitMock();

        $loader = $trait->getConfigLoader();

        $this->assertInstanceOf(ConfigLoader::class, $loader);
    }

}