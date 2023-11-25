<?php
function formatCurrency($value)
{
    return number_format($value, 0, ',', '.');
}
function renderFoodByTypeFood($typefood)
{
    $rows = getMonAnByName($typefood);
    if (is_array($rows)) {
        foreach ($rows as $row) {
            $tenmon = $row['ten_mon'];
            echo '
        <div class="menu-inner">
            <p class="menu-desc">
                ' . $row['ten_mon'] . '
            </p>
            <div class="menu-group">
                <div class="menu-price">
                    ' . formatCurrency($row['gia_mon']) . ' đ
                </div>
                <input type="hidden" name="name[' . $tenmon . '][gia_mon]" value="' . $row['gia_mon'] . '" class="menu-count">
                <input type="text" name="name[' . $tenmon . '][so_luong]" class="menu-count" placeholder="Số Lượng">
                <input type="hidden" name="name[' . $tenmon . '][ma_mon_an]"  value="' . $row['ma_mon_an'] . '"  class="menu-count">
                <input type="hidden" name="name[' . $tenmon . '][ten_mon]"  value="' . $row['ten_mon'] . '"  class="menu-count">
            </div>
        </div>';
        }
    }
}

function filterNonEmptyQuantities($menuItems)
{
    $filteredItems = [];
    foreach ($menuItems as $key => $item) {
        if (isset($item['so_luong']) && ($item['so_luong'] != '' && $item['so_luong'] != 0)) {
            $filteredItems[$key] = $item;
        }
    }
    return $filteredItems;
}

function renderFoodClient($typefood)
{
    $rows = getMonAnByName($typefood);
    if (is_array($rows)) {
        foreach ($rows as $row) {
            $tenmon = $row['ten_mon'];
            echo '
        <div class="form-group">
            <label for="">' . $tenmon . '</label>
            <div class="form-group-price">
                <p class="form-price">
                    ' . formatCurrency($row['gia_mon']) . ' đ
                </p>
                <input type="hidden" name="name[' . $tenmon . '][ma_mon_an]"  value="' . $row['ma_mon_an'] . '"  class="count">
                <input type="text" name="name[' . $tenmon . '][so_luong]"  class="count" placeholder="Số Lượng">
                <input type="hidden" name="name[' . $tenmon . '][gia_mon]" value="' . $row['gia_mon'] . '" class="count">
            </div>
        </div>
            ';
        }
    }
}

function updateSum($ma_hoa_don)
{
    $rows = getMenuById($ma_hoa_don);
    $sum = 0;
    foreach ($rows as $row) {
        extract($row);
        $sum += $don_gia * $so_luong;
    }
    updateHoaDon($sum, $ma_hoa_don);
}
