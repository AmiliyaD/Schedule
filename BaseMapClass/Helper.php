<?php
class Helper {

    public static function clearString($str)
    {
        return trim(strip_tags($str));
    }

    public static function clearInt($str)
    {
        return (int)$str;
    }

    public static function printSelectOptions($key, array $options, $nameOpt)

    {
        if ($options) {
            foreach ($options as $option) { ?>
            <option value="<?=$option['id'];?>" <?=($key ==  $option['id'])?'selected':'';?>><?=$option[$nameOpt]?></option>
            <?php }
            }
    }
}