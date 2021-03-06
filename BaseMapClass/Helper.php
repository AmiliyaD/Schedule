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

    public static function can($role)
    {
        if ($role == $_SESSION['roleName']) {
            return true;
        }
        return false;
    }
// ЛУШЧАЯ ФУНКЦИЯ ДЛЯ ВЫВОДА СПИСКА
    public static function printSelectOptions($key, array $options, $nameOpt)

    {
        if ($options) {
            foreach ($options as $option) { ?>
<option value="<?=$option['id'];?>" <?=($key ==  $option['id'])?'selected':'';?>><?=$option[$nameOpt]?></option>
<?php }
            }
    }
    // функция для вывода списка для расписания
    public static function printSelectOptionsForSchedule($key, array $options, $nameOne, $nameTwo)

    {
        if ($options) {
            foreach ($options as $option) { ?>
<option value="<?=$option[0];?>" <?=($key ==  $option['id'])?'selected':'';?>><?=$option[$nameOne]?> ->
    <?=$option[$nameTwo]?></option>
<?php }
            }
    }

    // пагинатор
    public static function paginator($count, $current, $size)
    {
       $current = 1;
       $size = 30;
       $numPages=ceil($count/$size);
$href = $_SERVER['PHP_SELF'].'?page=';
echo '<ul class="pagination  ">';
for ($i = 1; $i<=$numPages; $i++) {
if ($current == $i) {
echo ' <li class="paginate_button list-btn active"><a
href="'.$href.$i.'" data-dt-idx="'.$i.'"
tabindex="0">'.$i.'</a></li>';
} else {
echo ' <li class="paginate_button list-btn"><a
href="'.$href.$i.'" data-dt-idx="'.$i.'"
tabindex="0">'.$i.'</a></li>';
}
}
echo '</ul>';
    }
}