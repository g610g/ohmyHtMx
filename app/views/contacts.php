<div style="display:flex; flex-direction: column;" id="contacts">
    <?php
    foreach ($contacts as $contact) {
        echo "<span> Name: {$contact['name']}</span>";
        echo "<span> Email: {$contact['email']}</span>";
    }
    ?>
</div>
