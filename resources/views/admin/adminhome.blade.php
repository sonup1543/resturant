<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  @include("admin.admincss")

  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include("admin.navbar")
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include("admin.adminscript")
  </body>
</html>