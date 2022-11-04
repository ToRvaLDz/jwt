<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Tests\Signer;

use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\None;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Lcobucci\JWT\Signer\None
 *
 * @uses \Lcobucci\JWT\Signer\Key\InMemory
 */
final class NoneTest extends TestCase
{
    /**
     * @test
     *
     * @covers ::algorithmId
     */
    public function algorithmIdMustBeCorrect(): void
    {
        $signer = new None();

        self::assertSame('none', $signer->algorithmId());
    }

    /**
     * @test
     *
     * @covers ::sign
     */
    public function signShouldReturnAnEmptyString(): void
    {
        $signer = new None();

        self::assertSame('', $signer->sign('test', InMemory::plainText('test')));
    }

    /**
     * @test
     *
     * @covers ::verify
     */
    public function verifyShouldReturnTrueWhenSignatureHashIsEmpty(): void
    {
        $signer = new None();

        self::assertTrue($signer->verify('', 'test', InMemory::plainText('test')));
    }

    /**
     * @test
     *
     * @covers ::verify
     */
    public function verifyShouldReturnFalseWhenSignatureHashIsEmpty(): void
    {
        $signer = new None();

        self::assertFalse($signer->verify('testing', 'test', InMemory::plainText('test')));
    }
}