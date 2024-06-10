@php
    echo '<?xml version="1.0" encoding="UTF-8"?>'
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    
<url>
  <loc>https://ahitechno.com/</loc>
  <lastmod>2023-09-16T10:10:47+00:00</lastmod>
  <priority>0.8</priority>
</url>

<url>
  <loc>https://ahitechno.com/about-us</loc>
  <lastmod>2023-09-16T10:10:47+00:00</lastmod>
  <priority>0.8</priority>
</url>

<url>
  <loc>https://ahitechno.com/it-service</loc>
  <lastmod>2024-09-1T10:10:47+00:00</lastmod>
  <priority>0.8</priority>
</url>



@foreach ($itServices as $itServices)
    
<url>
    <loc>{{url('/')}}/it-services/{{$itServices->slug}}</loc>
    <lastmod>{{$itServices->created_at->tz('UTC')->toAtomString()}}</lastmod>
    <priority>0.8</priority>
</url>
@endforeach


<url>
  <loc>https://ahitechno.com/products</loc>
  <lastmod>2023-09-16T10:10:47+00:00</lastmod>
  <priority>0.8</priority>
</url>

@foreach ($projectCategory as $projectCategory)
<url>
  <loc>{{url('/')}}/products/{{$projectCategory->slug}}</loc>
  <lastmod>{{$projectCategory->created_at->tz('UTC')->toAtomString()}}</lastmod>
  <priority>0.8</priority>
</url>
@endforeach

@foreach ($itProduct as $itProduct)
<url>
  <loc>{{url('/')}}/single-product/{{$itProduct->slug}}</loc>
  <lastmod>{{$itProduct->created_at->tz('UTC')->toAtomString()}}</lastmod>
  <priority>0.8</priority>
</url>
@endforeach


<url>
  <loc>https://ahitechno.com/project</loc>
  <lastmod>2024-08-12T10:10:47+00:00</lastmod>
  <priority>0.8</priority>
</url>


@foreach ($projectsCategory as $projectsCategory)
<url>
    <loc>{{url('/')}}/project/{{$projectsCategory->slug}}</loc>
    <lastmod>{{$projectsCategory->created_at->tz('UTC')->toAtomString()}}</lastmod>
    <priority>0.8</priority>
</url>
@endforeach

@foreach ($project as $project)
<url>
    <loc>{{url('/')}}/project-details/{{$project->slug}}</loc>
    <lastmod>{{$project->created_at->tz('UTC')->toAtomString()}}</lastmod>
    <priority>0.8</priority>
</url>
@endforeach


<url>
  <loc>https://ahitechno.com/blogs</loc>
  <lastmod>2024-08-12T10:10:47+00:00</lastmod>
  <priority>0.8</priority>
</url>
@foreach($blogCategory as $blogCategory)
<url>
    <loc>{{url('/')}}/blogs/{{$blogCategory->slug}}</loc>
    <lastmod>{{$blogCategory->created_at->tz('UTC')->toAtomString()}}</lastmod>
    <priority>0.8</priority>
</url>
@endforeach




@foreach ($blogs as $blogs)

<url>
        <loc>{{url('/')}}/blog/{{$blogs->slug}}</loc>
        <lastmod>{{$blogs->created_at->tz('UTC')->toAtomString()}}</lastmod>
        <priority>0.8</priority>
    </url>
    @endforeach
     
    <url>
      <loc>https://ahitechno.com/contact-us</loc>
      <lastmod>2023-09-16T10:10:47+00:00</lastmod>
      <priority>0.8</priority>
    </url>

    <url>
      <loc>https://ahitechno.com/get-quotation</loc>
      <lastmod>2023-09-16T10:10:47+00:00</lastmod>
      <priority>0.8</priority>
    </url>

    <url>
        <loc>https://ahitechno.com/terms-and-condition</loc>
        <lastmod>2023-09-16T10:10:47+00:00</lastmod>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>https://ahitechno.com/privacy-and-policy</loc>
        <lastmod>2023-09-16T10:10:47+00:00</lastmod>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>https://ahitechno.com/shipping-and-policy</loc>
        <lastmod>2023-09-16T10:10:47+00:00</lastmod>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>https://ahitechno.com/cancellation-and-refund-policy</loc>
        <lastmod>2023-09-16T10:10:47+00:00</lastmod>
        <priority>0.8</priority>
    </url>




    <url>
      <loc>https://ahitechno.com/add-to-cart</loc>
      <lastmod>2023-09-16T10:10:47+00:00</lastmod>
      <priority>0.8</priority>
    </url>
    
    <url>
      <loc>https://ahitechno.com/buy-now</loc>
      <lastmod>2023-09-16T10:10:47+00:00</lastmod>
      <priority>0.8</priority>
    </url>

    <url>
      <loc>https://ahitechno.com/login_page</loc>
      <lastmod>2023-09-16T10:10:47+00:00</lastmod>
      <priority>0.8</priority>
    </url>

    <url>
      <loc>https://ahitechno.com/sign_up_page</loc>
      <lastmod>2023-09-16T10:10:47+00:00</lastmod>
      <priority>0.8</priority>
    </url>

   

 

</urlset>