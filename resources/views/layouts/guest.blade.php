<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    @vite('resources/css/app.css')
    @livewireStyles

    <title>Admin Panel</title>
</head>
<div class="flex min-h-screen">

    <!-- Container -->
    <div class="flex flex-row w-full">

      <!-- Sidebar -->
      <div class='relative hidden lg:flex flex-col justify-between bg-gray-200 lg:p-8 xl:p-12 lg:max-w-sm xl:max-w-4xl'>
        <img src="logo/topography.svg" class="absolute top-0 left-0 w-full h-screen opacity-[0.03] object-cover" alt="">
        <div class="flex items-center justify-start space-x-3">
          {{-- <span class="bg-black rounded-full w-8 h-8"></span>
          <a href="#" class="font-medium text-xl">Brand</a> --}}
        </div>
        <div class='space-y-5'>
          <h1 class="lg:text-3xl xl:text-5xl xl:leading-snug font-extrabold">SmartClass <span class="text-red-500">Schedular</span></h1>
          <p class="text-lg">Discover SmartClass Scheduler : <b>AI-generated timetables</b> and integrated <b>chat system</b> for effortless education management. Simplify scheduling and stay connected seamlessly. Get started now! </p>
          {{-- <button
            class="inline-block flex-none px-4 py-3 border-2 rounded-lg font-medium border-black bg-black text-white">Create
            account here</button> --}}
        </div>
        <p class="font-medium">© 2022 Company</p>
      </div>

      <!-- Login -->
      <div class="flex flex-1 flex-col items-center justify-center px-10 relative">
        <div class="flex lg:hidden justify-between items-center w-full py-4">
          <div class="flex items-center justify-start space-x-3">
            <span class="bg-black rounded-full w-6 h-6"></span>
            <a href="#" class="font-medium text-lg">Brand</a>
          </div>
          <div class="flex items-center space-x-2">
            <span>Not a member? </span>
            <a href="#" class="underline font-medium text-[#070eff]">
              Sign up now
            </a>
          </div>
        </div>
        <!-- Login box -->
        @yield('main')


      </div>
    </div>

  </div>
  @livewireScripts
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/app.js"></script>
 

</body>
</html>