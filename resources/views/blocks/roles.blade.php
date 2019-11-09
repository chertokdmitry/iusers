<?php
if(!empty($item->type->roles)) {
    $rendered = [];
    if (count($item->roles) > 0) {
        foreach ($item->type->roles as $role) {
            foreach($item->roles as $userRole) {
                if ($userRole->id == $role->id) {
                    echo '<p class="text-secondary">' . $role->name .
                        '<a id=' . $item->id . '-' . $role->id . ' class="text-danger remove-role" href="#"
                        data-user="' . $item->id . '"
                        data-role="' . $role->id . '">
                    <span data-feather="check-circle"></span>
                    </a></p>';
                    $rendered[] = $role->id;
                }
            }
        }
    }

    foreach ($item->type->roles as $role) {
        if (!in_array($role->id, $rendered)) {
            echo '<p class="text-secondary">' . $role->name .
                '<a id=' . $item->id . '-' . $role->id . ' class="text-secondary add-role" href="#"
                        data-user="' . $item->id . '"
                        data-role="' . $role->id . '">
                    <span data-feather="check-circle"></span>
                    </a></p>';
        }
    }
}
