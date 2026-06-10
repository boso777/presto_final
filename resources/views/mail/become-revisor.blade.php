<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Richiesta Revisore</title>
</head>
<body style="font-family: 'Inter', system-ui, -apple-system, sans-serif; background-color: #fff1e6; color: #4a4a4a; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #f0efeb; padding: 40px; border: 1px solid #eddcd2;">
        <h1 style="color: #cb997e; font-weight: 700; text-transform: uppercase; margin-top: 0;">Nuova richiesta revisore</h1>
        <p>Un utente ha chiesto di collaborare con noi come revisore.</p>
        
        <div style="background-color: #fff; padding: 20px; border: 1px solid #eddcd2; margin: 20px 0;">
            <p style="margin: 5px 0;"><strong>Nome:</strong> {{$user->name}}</p>
            <p style="margin: 5px 0;"><strong>Email:</strong> {{$user->email}}</p>
        </div>
        
        <p>Se vuoi rendere l'utente un revisore, clicca sul pulsante sottostante:</p>
        
        <a href="{{route('revisor.make', compact('user'))}}" 
           style="display: inline-block; background-color: #cb997e; color: #ffffff; padding: 10px 20px; text-decoration: none; font-weight: 600; text-transform: lowercase; border-radius: 0;">
           Rendi revisor
        </a>
    </div>
</body>
</html>