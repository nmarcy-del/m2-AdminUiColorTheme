<?php

namespace Del001\AdminUiColorSwap\Test\Unit\Model\Config\Backend;

use Del001\AdminUiColorSwap\Model\Config\Backend\Color;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Exception\LocalizedException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionProperty;

class ColorTest extends TestCase
{
    public function testStoresValidColorsAndAllowsClearing(): void
    {
        $model = $this->model();
        $model->setValue('  #aB12dF  ');
        $model->beforeSave();
        self::assertSame('#aB12dF', $model->getValue());

        $model->setValue(' ');
        $model->beforeSave();
        self::assertSame('', $model->getValue());
    }

    public function testRejectsInvalidColorAtSaveTime(): void
    {
        $model = $this->model();
        $model->setValue('not a color');

        $this->expectException(LocalizedException::class);
        $model->beforeSave();
    }

    private function model(): Color
    {
        $model = (new ReflectionClass(Color::class))->newInstanceWithoutConstructor();
        $property = new ReflectionProperty(Color::class, '_eventManager');
        $property->setValue($model, $this->createStub(ManagerInterface::class));

        return $model;
    }
}
