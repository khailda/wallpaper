<%@ Page Language="C#" AutoEventWireup="true" CodeFile="colr.aspx.cs" Inherits="boot_Default" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
     <link href="boot/css/bootstrap.min.css" rel="stylesheet" />
      <link href="boot/css/bootstrap-theme.min.css" rel="stylesheet" />
    <script src="boot/js/bootstrap.min.js"></script>
        
</head>
<body>
    <form id="form1" runat="server">
    
<nav class="navbar navbar-custom navbar-static-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Title</a>
  </div>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu pull-right">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<div class="container">
  <h2>Bootstrap 3 Navbar Example</h2>
  <ul>
    <li>Use <code>.navbar-static-top</code> to eliminate the border radius</li>
    <li>Use <code>.navbar-right</code> to right-align link and dropdown</li>
    <li>Use <code>.pull-right</code> in the right-aligned <code>.dropdown-menu</code> so that the menu isn't cutoff</li>
  </ul>
</div>

    </form>
</body>
</html>
