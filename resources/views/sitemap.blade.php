<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->


<url>
  <loc>https://ahitechno.com</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>1.00</priority>
</url>

<url>
  <loc>https://ahitechno.com/contact-us</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>0.80</priority>
</url>

<url>
  <loc>https://ahitechno.com/blogs</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>0.80</priority>
</url>

<url>
  <loc>https://ahitechno.com/projects</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>0.80</priority>
</url>

<url>
  <loc>https://ahitechno.com/about-us</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>0.80</priority>
</url>
 
@foreach($blog as $slug)
<url>
  <loc>https://ahitechno.com/blog/{{ $slug->slug }}</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>0.64</priority>
</url>

@endforeach


 
@foreach($project as $slug)
<url>
  <loc>https://ahitechno.com/project_details/{{ $slug->slug }}</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>0.64</priority>
</url>

@endforeach


@foreach($blogCategory as $slug)
<url>
  <loc>https://ahitechno.com/blogs/{{ $slug->slug }}</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>0.64</priority>
</url>

@endforeach


@foreach($projectCategory as $slug)
<url>
  <loc>https://ahitechno.com/projects/{{ $slug->slug }}</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>0.64</priority>
</url>

@endforeach

@foreach($itServicesCategory as $slug)
<url>
  <loc>https://ahitechno.com/it-servies/{{ $slug->slug }}</loc>
  <lastmod><?php echo date('Y-m-d', strtotime(' -2 day')) ?>T10:42:43+00:00</lastmod>
  <priority>0.64</priority>
</url>

@endforeach




</urlset>