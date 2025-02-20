<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP + HTMX</title>
    <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
</head>

<body>

    <form hx-post="/contacts" hx-target="#contacts" hx-swap="outerHTML">
        Name: <input name="name" type="text" />
        Email: <input name="email" type="email" />
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
