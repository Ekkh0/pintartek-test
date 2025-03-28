<nav class="navbar navbar-default justify-content-between mb-3" style="padding-left: 24px; padding-right: 24px;">
  <div class="d-flex">
    <a class="navbar-brand" href="/">CardiNote</a>
    <div class="d-flex align-items-center">
      Welcome, {{ Auth::user()->name }}!
    </div>
  </div>
  <a class="nav-link" href="/logout">Logout</a>
</nav>

<style scoped>
  .navbar {
    background-color: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
  }

  .navbar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .navbar-brand {
    font-size: 1.5rem;
    font-weight: 700;
    color: #343a40;
  }

  .nav-link {
    color: #343a40;
    text-decoration: none;
  }
</style>