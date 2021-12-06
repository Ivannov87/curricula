<?php
class AreaC
{
    public function LoadA()
    {
        $table = "area";
        $resp = AreaM::GetAreas($table);

        foreach ($resp as $key => $value) {

            echo '<option value = "' . $value["AreaId"] . '">' . $value["Descripcion"] . '</option>';
        }
    }
}
