<!doctype html>
<html lang="en">
<head>
  <base href="../../public/">
  <meta charset="utf-8">
  <title>Register | EV CRM</title>
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 shadow" style="width: 360px;">
    <h4 class="text-center mb-3">Register</h4>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST" action="/register">
      <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-success w-100">Register</button>
      <p class="mt-3 text-center">
        <a href="/login">Already have an account?</a>
      </p>
    </form>
  </div>
</div>
</body>
</html>
    