<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login | EV CRM</title>
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 shadow" style="width: 360px;">
    <h4 class="text-center mb-3">EV CRM Login</h4>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST" action="/login">
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-primary w-100">Login</button>
      <p class="mt-3 text-center">
        <a href="/register">Create account</a>
      </p>
    </form>
  </div>
</div>
</body>
</html>
