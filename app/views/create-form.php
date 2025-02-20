<form hx-post="/contacts" hx-swap="outerHTML">
    Name: <input name="name" type="text" />
    Email: <input name="email" type="email" />
    <?php
    if (isset($errors['email'])) {
        echo "<span style='color:red;'>{$errors['email']}</span>";
    }
    ?>
    <button type="submit">Create Contact</button>
</form>
