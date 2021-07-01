---
title: "Project Hanzai"
publishAt: 2013-11-27
draft: false
---

**Project Hanzai** started out as two things: a thirst to learn more about API's, and the desire to learn the FuelPHP framework.

You can do some amazing things with data sets provided by others. NASA maintains and releases the data and information they retrieve about our planet and space in a set of open API's. Wunderground provides an API to access the data they collect on weather all over the world. Your local city may even provide open API's on various statistics.

Seattle, the city I live in, provides such a set of API's, and one of them is a data set of Seattle Police Reports around the city.

> **Seattle Police Department Police Report Incident**
>
> These incidents are based on initial police reports taken by officers when responding to incidents around the city. The information enters our Records Management System (RMS) and is then transmitted out to data.seattle.gov. This information is published within 6 to 12 hours after the report is filed into the system.

Not only that, but it also provides Latitude and Longitude coordinates for each incident report. Nice, so I can then tie all this onto a map via Google Maps, and have a nice little interactive dashboard. Sounds pretty cool, no?

After I'd say, a couple days of setting to work on this and tinkering around, this is what I came out with:

![Screenshot](/posts/project_hanzai.png)

Using FuelPHP I was easily able to connect and access the information provided by the API. Google Maps is a breeze to integrate with, as well as the ability to customize the look and feel. And finally, Bootstrap played a part in allowing me to easily lay everything out without hassle.

There are still some bugs to work out, but I don't know if I'll ever get around to patching them up. I have some idea's to extend on this, and make it a sort of... information dashboard, fleshing out the details of each report; loading in the Seattle PD twitter feed on the side with live updates. But, we'll see. I had fun developing this in the end.