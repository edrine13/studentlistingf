@include('partials.header')
<?php $array = array('title' => 'Student System') ;?>
<x-nav :data="$array"/>


<header class="max-w-lg mx-auto mt-5">
   <a href="#">
      <h1 class="text-4xl font-bold text-white text-center">Student List</h1>
   </a>
</header>
 
<section class="mt-10">

   <div class=" ">
     <form action="" class="g-1 text-center mb-3">
         <div class="col">
            <input type="text" class="mb-2 mt-1 w-60 px-3 py-2 bg-white border-slate-300 rounded-full text-sm shadow-sm placeholder-slate-500 focus:outline-none
             focus:border-sky-500 focus:ring-2 focus:ring-sky-500" name="q" value="{{ $q }}" placeholder="Search here...">
         </div>
         <div class="col">
            <button class="btn btn-success w-32">Search</button>
            <a href="http://127.0.0.1:8000/" class="btn btn-primary w-32">Reset</a>
         </div>
     </form>
      <table class="w-100 mx-auto text-sm text-left text-gray-500">
         <thead class="text-xs text gray-700 uppercase bg-gray-50">
            <tr>
               <th scope="col" class="py-3 px-6">
           
                 @sortablelink('first_name', 'First Name')
                 @if (request()->sort == 'first_name')
                 @if (request()->direction == 'desc')
                     &darr;
                 @else
                     &uarr;
                 @endif
             @endif
             
               </th>
               <th scope="col" class="py-3 px-6" >
                  @sortablelink('last_name', 'Last Name')
                  @if (request()->sort == 'last_name')
                      @if (request()->direction == 'desc')
                          &darr;
                      @else
                          &uarr;
                      @endif
                  @endif
               </th>
               <th scope="col" class="py-3 px-6" >
                  @sortablelink('email')
                  @if (request()->sort == 'email')
                  @if (request()->direction == 'desc')
                      &darr;
                  @else
                      &uarr;
                  @endif
              @endif
               </th>
               <th scope="col" class="py-3 px-6" >
                  @sortablelink('age')
                  @if (request()->sort == 'age')
                  @if (request()->direction == 'desc')
                      &darr;
                  @else
                      &uarr;
                  @endif
              @endif
               </th>
               <th scope="col" class="py-3 px-6" >
                  @sortablelink('gender')
                  @if (request()->sort == 'gender')
                  @if (request()->direction == 'desc')
                      &darr;
                  @else
                      &uarr;
                  @endif
              @endif
               </th>
               <th scope="col" class="py-3 px-6">
                  Action
               </th>
            </tr>
         </thead>

         <tbody>
            @foreach ($students as $student)
            <tr class="bg-gray-800 border-b text-white">
               <td class="py-4 px-6">
                  {{ $student-> first_name }}
               </td>
               <td class="py-4 px-6">
                  {{ $student-> last_name }}
               </td>
               <td class="py-4 px-6">
                  {{ $student-> email }}
               </td>
               <td class="py-4 px-6">
                  {{ $student-> age }}
               </td>  
               <td class="py-4 px-6">
                  {{ $student-> gender }}
               </td>  
               <td class="py-4 px-6">
                  <a href="/student/{{$student->id}}" class="bg-sky-600 text-white px-4 py-1 rounded">view</a>
               </td>            
            </tr>
            @endforeach
         </tbody>
      </table>
      <div class="mx-auto max-w-lg pt-6 p-4">
         {{$students->links()}}
      </div>
   </div>
</section>

@include('partials.footer')

