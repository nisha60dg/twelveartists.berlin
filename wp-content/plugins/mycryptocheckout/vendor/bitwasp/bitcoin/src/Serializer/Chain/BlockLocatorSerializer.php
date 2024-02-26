<?php

namespace BitWasp\Bitcoin\Serializer\Chain;

use BitWasp\Bitcoin\Chain\BlockLocator;
use BitWasp\Bitcoin\Serializer\Types;
use BitWasp\Buffertools\Buffer;
use BitWasp\Buffertools\BufferInterface;
use BitWasp\Buffertools\Parser;

class BlockLocatorSerializer
{

    /**
     * @var \BitWasp\Buffertools\Types\VarInt
     */
    private $varint;

    /**
     * @var \BitWasp\Buffertools\Types\ByteString
     */
    private $bytestring32le;

    public function __construct()
    {
        $this->varint = Types::varint();
        $this->bytestring32le = Types::bytestringle(32);
    }

    /**
     * @param Parser $parser
     * @return BlockLocator
     */
    public function fromParser(Parser $parser)
    {
        $numHashes = $this->varint->read($parser);
        $hashes = [];
        for ($i = 0; $i < $numHashes; $i++) {
            $hashes[] = $this->bytestring32le->read($parser);
        }

        $hashStop = $this->bytestring32le->read($parser);

        return new BlockLocator($hashes, $hashStop);
    }

    /**
     * @param BufferInterface|string $data
     * @return BlockLocator
     */
    public function parse($data)
    {
        return $this->fromParser(new Parser($data));
    }

    /**
     * @param BlockLocator $blockLocator
     * @return \BitWasp\Buffertools\BufferInterface
     */
    public function serialize(BlockLocator $blockLocator)
    {
        $binary = $this->varint->write(count($blockLocator->getHashes()));
        foreach ($blockLocator->getHashes() as $hash) {
            $binary .= $this->bytestring32le->write($hash);
        }

        $binary .= $this->bytestring32le->write($blockLocator->getHashStop());
        return new Buffer($binary);
    }
}
