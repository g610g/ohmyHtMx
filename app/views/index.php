<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP + HTMX</title>
    <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.body.addEventListener('htmx:beforeSwap', (event) => {
                if (event.detail.xhr.status === 422) {
                    event.detail.shouldSwap = true;
                    event.detail.isError = false;
                }
            });
        });
    </script>
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
    <div id="contacts" style="display: flex; flex-direction: column;">
        <?php
        foreach ($contacts as $contact) {
            echo "<span> Name: {$contact['name']}</span>";
            echo "<span> Email: {$contact['email']}</span>";
        }
        ?>
    </div>
</body>

</html>
