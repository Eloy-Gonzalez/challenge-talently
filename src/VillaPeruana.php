<?php

namespace App;

class VillaPeruana {
    /**
     * @var $name (string) | Nombre del producto
     */
    public $name;

    /**
     * @var $quality (string) | Calidad del producto
     */
    public $quality;

    /**
     * @var $sellIn (string) | Dias en los que se tiene que vender el producto
     */
    public $sellIn;

    public function __construct($name, $quality, $sellIn) {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick() {
        if ($this->name != 'Pisco Peruano' && $this->name != 'Ticket VIP al concierto de Pick Floid') {
            if ($this->quality > 0) {
                if($this->name == 'Café Altocusco') {
                    $this->quality -= 2;
                } else if ($this->name != 'Tumi de Oro Moche') {
                    $this->quality -= 1;
                }
            }
        } else {
            if ($this->quality < 50) {
                $this->quality += 1;

                if ($this->name == 'Ticket VIP al concierto de Pick Floid') {
                    if ($this->sellIn < 11) {
                        if ($this->quality < 50) {
                            $this->quality += 1;
                        }
                    }
                    if ($this->sellIn < 6) {
                        if ($this->quality < 50) {
                            $this->quality += 1;
                        }
                    }
                }
            }
        }

        if ($this->name != 'Tumi de Oro Moche') {
            $this->sellIn -= 1;
        }

        if ($this->sellIn < 0) {
            if ($this->name != 'Pisco Peruano') {
                if ($this->name != 'Ticket VIP al concierto de Pick Floid') {
                    if ($this->quality > 0) {
                        if($this->name == 'Café Altocusco'){
                            $this->quality -= 2;
                        } else if ($this->name != 'Tumi de Oro Moche') {
                            $this->quality -= 1;
                        }
                    }
                } else {
                    $this->quality = $this->quality - $this->quality;
                }
            } else {
                if ($this->quality < 50) {
                    $this->quality += 1;
                }
            }
        }
    }
}
