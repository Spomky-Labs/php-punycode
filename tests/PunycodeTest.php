<?php

use SpomkyLabs\Punycode;

class PunycodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test encoding Punycode.
     *
     * @param string $decoded Decoded domain
     * @param string $encoded Encoded domain
     * @dataProvider domainNamesProvider
     */
    public function testEncode($decoded, $encoded)
    {
        $result = Punycode::encode($decoded);
        $this->assertEquals($encoded, $result);
    }

    /**
     * Test decoding Punycode.
     *
     * @param string $decoded Decoded domain
     * @param string $encoded Encoded domain
     * @dataProvider domainNamesProvider
     */
    public function testDecode($decoded, $encoded)
    {
        $result = Punycode::decode($encoded);
        $this->assertEquals(mb_strtolower($decoded), $result);
    }

    /**
     * Provide domain names containing the decoded and encoded names.
     *
     * @return array
     */
    public function domainNamesProvider()
    {
        return [
            // http://en.wikipedia.org/wiki/.test_(international_domain_name)#Test_TLDs
            [
                'مثال.إختبار',
                'xn--mgbh0fb.xn--kgbechtv',
            ],
            [
                'مثال.آزمایشی',
                'xn--mgbh0fb.xn--hgbk6aj7f53bba',
            ],
            [
                '例子.测试',
                'xn--fsqu00a.xn--0zwm56d',
            ],
            [
                '例子.測試',
                'xn--fsqu00a.xn--g6w251d',
            ],
            [
                'пример.испытание',
                'xn--e1afmkfd.xn--80akhbyknj4f',
            ],
            [
                'उदाहरण.परीक्षा',
                'xn--p1b6ci4b4b3a.xn--11b5bs3a9aj6g',
            ],
            [
                'παράδειγμα.δοκιμή',
                'xn--hxajbheg2az3al.xn--jxalpdlp',
            ],
            [
                '실례.테스트',
                'xn--9n2bp8q.xn--9t4b11yi5a',
            ],
            [
                'בײַשפּיל.טעסט',
                'xn--fdbk5d8ap9b8a8d.xn--deba0ad',
            ],
            [
                '例え.テスト',
                'xn--r8jz45g.xn--zckzah',
            ],
            [
                'உதாரணம்.பரிட்சை',
                'xn--zkc6cc5bi7f6e.xn--hlcj6aya9esc7a',
            ],

            [
                'derhausüberwacher.de',
                'xn--derhausberwacher-pzb.de',
            ],
            [
                'renangonçalves.com',
                'xn--renangonalves-pgb.com',
            ],
            [
                'рф.ru',
                'xn--p1ai.ru',
            ],
            [
                'δοκιμή.gr',
                'xn--jxalpdlp.gr',
            ],
            [
                'ফাহাদ্১৯.বাংলা',
                'xn--65bj6btb5gwimc.xn--54b7fta0cc',
            ],
            [
                '𐌀𐌖𐌋𐌄𐌑𐌉·𐌌𐌄𐌕𐌄𐌋𐌉𐌑.gr',
                'xn--uba5533kmaba1adkfh6ch2cg.gr',
            ],
            [
                'guangdong.广东',
                'guangdong.xn--xhq521b',
            ],
            [
                'gwóźdź.pl',
                'xn--gwd-hna98db.pl',
            ],
            // http://www.gnu.org/software/libidn/draft-josefsson-idn-test-vectors.html
            [
                "Hello\x2DAnother\x2DWay\x2D\xE3\x81\x9D\xE3\x82\x8C\xE3\x81\x9E\xE3\x82\x8C\xE3\x81\xAE\xE5\xA0\xB4\xE6\x89\x80",
                'xn--hello-another-way--fc4qua05auwb3674vfr0b',
            ],
            [
                "\xD9\x84\xD9\x8A\xD9\x87\xD9\x85\xD8\xA7\xD8\xA8\xD8\xAA\xD9\x83\xD9\x84\xD9\x85\xD9\x88\xD8\xB4\xD8\xB9\xD8\xB1\xD8\xA8\xD9\x8A\xD8\x9F",
                'xn--egbpdaj6bu4bxfgehfvwxn',
            ],
            [
                "\xE4\xBB\x96\xE4\xBB\xAC\xE4\xB8\xBA\xE4\xBB\x80\xE4\xB9\x88\xE4\xB8\x8D\xE8\xAF\xB4\xE4\xB8\xAD\xE6\x96\x87",
                'xn--ihqwcrb4cv8a8dqg056pqjye',
            ],
            [
                "\xE4\xBB\x96\xE5\x80\x91\xE7\x88\xB2\xE4\xBB\x80\xE9\xBA\xBD\xE4\xB8\x8D\xE8\xAA\xAA\xE4\xB8\xAD\xE6\x96\x87",
                'xn--ihqwctvzc91f659drss3x8bo0yb',
            ],
            [
                "Pro\xC4\x8Dprost\xC4\x9Bnemluv\xC3\xAD\xC4\x8Desky",
                'xn--proprostnemluvesky-uyb24dma41a',
            ],
            [
                "\xD7\x9C\xD7\x9E\xD7\x94\xD7\x94\xD7\x9D\xD7\xA4\xD7\xA9\xD7\x95\xD7\x98\xD7\x9C\xD7\x90\xD7\x9E\xD7\x93\xD7\x91\xD7\xA8\xD7\x99\xD7\x9D\xD7\xA2\xD7\x91\xD7\xA8\xD7\x99\xD7\xAA",
                'xn--4dbcagdahymbxekheh6e0a7fei0b',
            ],
            [
                "\xE0\xA4\xAF\xE0\xA4\xB9\xE0\xA4\xB2\xE0\xA5\x8B\xE0\xA4\x97\xE0\xA4\xB9\xE0\xA4\xBF\xE0\xA4\xA8\xE0\xA5\x8D\xE0\xA4\xA6\xE0\xA5\x80\xE0\xA4\x95\xE0\xA5\x8D\xE0\xA4\xAF\xE0\xA5\x8B\xE0\xA4\x82\xE0\xA4\xA8\xE0\xA4\xB9\xE0\xA5\x80\xE0\xA4\x82\xE0\xA4\xAC\xE0\xA5\x8B\xE0\xA4\xB2\xE0\xA4\xB8\xE0\xA4\x95\xE0\xA4\xA4\xE0\xA5\x87\xE0\xA4\xB9\xE0\xA5\x88\xE0\xA4\x82",
                'xn--i1baa7eci9glrd9b2ae1bj0hfcgg6iyaf8o0a1dig0cd',
            ],
            [
                "\xE3\x81\xAA\xE3\x81\x9C\xE3\x81\xBF\xE3\x82\x93\xE3\x81\xAA\xE6\x97\xA5\xE6\x9C\xAC\xE8\xAA\x9E\xE3\x82\x92\xE8\xA9\xB1\xE3\x81\x97\xE3\x81\xA6\xE3\x81\x8F\xE3\x82\x8C\xE3\x81\xAA\xE3\x81\x84\xE3\x81\xAE\xE3\x81\x8B",
                'xn--n8jok5ay5dzabd5bym9f0cm5685rrjetr6pdxa',
            ],
            [
                "\xD0\xBF\xD0\xBE\xD1\x87\xD0\xB5\xD0\xBC\xD1\x83\xD0\xB6\xD0\xB5\xD0\xBE\xD0\xBD\xD0\xB8\xD0\xBD\xD0\xB5\xD0\xB3\xD0\xBE\xD0\xB2\xD0\xBE\xD1\x80\xD1\x8F\xD1\x82\xD0\xBF\xD0\xBE\xD1\x80\xD1\x83\xD1\x81\xD1\x81\xD0\xBA\xD0\xB8",
                'xn--b1abfaaepdrnnbgefbadotcwatmq2g4l',
            ],
            [
                "Porqu\xC3\xA9nopuedensimplementehablarenEspa\xC3\xB1ol",
                'xn--porqunopuedensimplementehablarenespaol-fmd56a',
            ],
            [
                "T\xE1\xBA\xA1isaoh\xE1\xBB\x8Dkh\xC3\xB4ngth\xE1\xBB\x83ch\xE1\xBB\x89n\xC3\xB3iti\xE1\xBA\xBFngVi\xE1\xBB\x87t",
                'xn--tisaohkhngthchnitingvit-kjcr8268qyxafd2f1b9g',
            ],
            [
                "3\xE5\xB9\xB4B\xE7\xB5\x84\xE9\x87\x91\xE5\x85\xAB\xE5\x85\x88\xE7\x94\x9F",
                'xn--3b-ww4c5e180e575a65lsy2b',
            ],
            [
                "\xE5\xAE\x89\xE5\xAE\xA4\xE5\xA5\x88\xE7\xBE\x8E\xE6\x81\xB5\x2Dwith\x2DSUPER\x2DMONKEYS",
                'xn---with-super-monkeys-pc58ag80a8qai00g7n9n',
            ],
            [
                "Hello\x2DAnother\x2DWay\x2D\xE3\x81\x9D\xE3\x82\x8C\xE3\x81\x9E\xE3\x82\x8C\xE3\x81\xAE\xE5\xA0\xB4\xE6\x89\x80",
                'xn--hello-another-way--fc4qua05auwb3674vfr0b',
            ],
            [
                "\xE3\x81\xB2\xE3\x81\xA8\xE3\x81\xA4\xE5\xB1\x8B\xE6\xA0\xB9\xE3\x81\xAE\xE4\xB8\x8B2",
                'xn--2-u9tlzr9756bt3uc0v',
            ],
            [
                "Maji\xE3\x81\xA7Koi\xE3\x81\x99\xE3\x82\x8B5\xE7\xA7\x92\xE5\x89\x8D",
                'xn--majikoi5-783gue6qz075azm5e',
            ],
            [
                "\xE3\x83\x91\xE3\x83\x95\xE3\x82\xA3\xE3\x83\xBCde\xE3\x83\xAB\xE3\x83\xB3\xE3\x83\x90",
                'xn--de-jg4avhby1noc0d',
            ],
            [
                "\xE3\x81\x9D\xE3\x81\xAE\xE3\x82\xB9\xE3\x83\x94\xE3\x83\xBC\xE3\x83\x89\xE3\x81\xA7",
                'xn--d9juau41awczczp',
            ],
            [
                "\xCE\xB5\xCE\xBB\xCE\xBB\xCE\xB7\xCE\xBD\xCE\xB9\xCE\xBA\xCE\xAC",
                'xn--hxargifdar',
            ],
            [
                "bon\xC4\xA1usa\xC4\xA7\xC4\xA7a",
                'xn--bonusaa-5bb1da',
            ],
            [
                "\xD0\xBF\xD0\xBE\xD1\x87\xD0\xB5\xD0\xBC\xD1\x83\xD0\xB6\xD0\xB5\xD0\xBE\xD0\xBD\xD0\xB8\xD0\xBD\xD0\xB5\xD0\xB3\xD0\xBE\xD0\xB2\xD0\xBE\xD1\x80\xD1\x8F\xD1\x82\xD0\xBF\xD0\xBE\xD1\x80\xD1\x83\xD1\x81\xD1\x81\xD0\xBA\xD0\xB8",
                'xn--b1abfaaepdrnnbgefbadotcwatmq2g4l',
            ],
        ];
    }
}
