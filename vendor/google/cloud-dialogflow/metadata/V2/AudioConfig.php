<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/audio_config.proto

namespace GPBMetadata\Google\Cloud\Dialogflow\V2;

class AudioConfig
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0aaf0d0a2d676f6f676c652f636c6f75642f6469616c6f67666c6f772f76" .
            "322f617564696f5f636f6e6669672e70726f746f121a676f6f676c652e63" .
            "6c6f75642e6469616c6f67666c6f772e76321a1c676f6f676c652f617069" .
            "2f616e6e6f746174696f6e732e70726f746f22fe010a10496e7075744175" .
            "64696f436f6e66696712410a0e617564696f5f656e636f64696e67180120" .
            "01280e32292e676f6f676c652e636c6f75642e6469616c6f67666c6f772e" .
            "76322e417564696f456e636f64696e6712190a1173616d706c655f726174" .
            "655f686572747a18022001280512150a0d6c616e67756167655f636f6465" .
            "18032001280912140a0c7068726173655f68696e74731804200328091245" .
            "0a0d6d6f64656c5f76617269616e74180a2001280e322e2e676f6f676c65" .
            "2e636c6f75642e6469616c6f67666c6f772e76322e5370656563684d6f64" .
            "656c56617269616e7412180a1073696e676c655f7574746572616e636518" .
            "082001280822660a14566f69636553656c656374696f6e506172616d7312" .
            "0c0a046e616d6518012001280912400a0b73736d6c5f67656e6465721802" .
            "2001280e322b2e676f6f676c652e636c6f75642e6469616c6f67666c6f77" .
            "2e76322e53736d6c566f69636547656e64657222b3010a1653796e746865" .
            "73697a65537065656368436f6e66696712150a0d737065616b696e675f72" .
            "617465180120012801120d0a05706974636818022001280112160a0e766f" .
            "6c756d655f6761696e5f6462180320012801121a0a12656666656374735f" .
            "70726f66696c655f6964180520032809123f0a05766f6963651804200128" .
            "0b32302e676f6f676c652e636c6f75642e6469616c6f67666c6f772e7632" .
            "2e566f69636553656c656374696f6e506172616d7322cd010a114f757470" .
            "7574417564696f436f6e66696712470a0e617564696f5f656e636f64696e" .
            "6718012001280e322f2e676f6f676c652e636c6f75642e6469616c6f6766" .
            "6c6f772e76322e4f7574707574417564696f456e636f64696e6712190a11" .
            "73616d706c655f726174655f686572747a18022001280512540a1873796e" .
            "74686573697a655f7370656563685f636f6e66696718032001280b32322e" .
            "676f6f676c652e636c6f75642e6469616c6f67666c6f772e76322e53796e" .
            "74686573697a65537065656368436f6e6669672afb010a0d417564696f45" .
            "6e636f64696e67121e0a1a415544494f5f454e434f44494e475f554e5350" .
            "454349464945441000121c0a18415544494f5f454e434f44494e475f4c49" .
            "4e4541525f3136100112170a13415544494f5f454e434f44494e475f464c" .
            "4143100212180a14415544494f5f454e434f44494e475f4d554c41571003" .
            "12160a12415544494f5f454e434f44494e475f414d52100412190a154155" .
            "44494f5f454e434f44494e475f414d525f57421005121b0a17415544494f" .
            "5f454e434f44494e475f4f47475f4f505553100612290a25415544494f5f" .
            "454e434f44494e475f53504545585f574954485f4845414445525f425954" .
            "4510072a760a125370656563684d6f64656c56617269616e7412240a2053" .
            "50454543485f4d4f44454c5f56415249414e545f554e5350454349464945" .
            "44100012160a125553455f424553545f415641494c41424c45100112100a" .
            "0c5553455f5354414e44415244100212100a0c5553455f454e48414e4345" .
            "4410032a8d010a0f53736d6c566f69636547656e64657212210a1d53534d" .
            "4c5f564f4943455f47454e4445525f554e5350454349464945441000121a" .
            "0a1653534d4c5f564f4943455f47454e4445525f4d414c451001121c0a18" .
            "53534d4c5f564f4943455f47454e4445525f46454d414c451002121d0a19" .
            "53534d4c5f564f4943455f47454e4445525f4e45555452414c10032aa401" .
            "0a134f7574707574417564696f456e636f64696e6712250a214f55545055" .
            "545f415544494f5f454e434f44494e475f554e5350454349464945441000" .
            "12230a1f4f55545055545f415544494f5f454e434f44494e475f4c494e45" .
            "41525f31361001121d0a194f55545055545f415544494f5f454e434f4449" .
            "4e475f4d5033100212220a1e4f55545055545f415544494f5f454e434f44" .
            "494e475f4f47475f4f5055531003429f010a1e636f6d2e676f6f676c652e" .
            "636c6f75642e6469616c6f67666c6f772e76324210417564696f436f6e66" .
            "696750726f746f50015a44676f6f676c652e676f6c616e672e6f72672f67" .
            "656e70726f746f2f676f6f676c65617069732f636c6f75642f6469616c6f" .
            "67666c6f772f76323b6469616c6f67666c6f77f80101a202024446aa021a" .
            "476f6f676c652e436c6f75642e4469616c6f67666c6f772e563262067072" .
            "6f746f33"
        ), true);

        static::$is_initialized = true;
    }
}

