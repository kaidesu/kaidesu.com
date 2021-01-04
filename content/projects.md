---
title: "Projects"
date: 2021-01-03
---

Outside of my day job, I work on a multitude of side projects. I'm a big fan of building your own tools. Not only does it allow you to build around your specific workflow, but it also allows you to explore a wide range of interesting projects to gain experience in. The projects listed below are in no particular order.

## Released
These projects have been released in some form or another and are used in production. Most are open source while some are not.

[**Ghost**](https://ghostlang.org)
A small class-based programming language with an interpreter built with Go. The name and logo are inspired by Ghost in the Shell.

[**Engine**](https://github.com/ghost-language/engine)
A simple 2D game engine to make games in Ghost inspired by Love2D, Pico-8, and DOME. The base application is built with Go, embeds Ghost and utilizes SDL2 to interface with the audio, keyboard, mouse, joystick and graphics hardware via OpenGL and Direct3D.

[**FusionCMS**](https://beta.getfusioncms.com)
My main role at efelle creative is building a content management system (CMS) called FusionCMS. I've lead development since version 5 of its release, and we're currently working towards releasing version 6 sometime this year. FusionCMS is the largest on-going project I've work on, having been used to build and launch over 200 websites.

**Apollo**
A closed-source website monitoring tool built during my time at efelle creative. It's integrated with Slack and pings a specific channel to notify our support and sysops teams of sites that become unresponsive. It checks all websites we host and support every minute from a server in the US. If a site becomes unresponsive, a second drone worker will verify the results in Europe in which case a Slack message is sent out to the team.

**Athena**
A closed-source encrypted password manager. Used to securely store and share passwords for various accounts by multiple people.

**efelle SSO**
In order to consolidate accounts and ease internal support, I created a single sign-on service to centralize all team member accounts into one at efelle creative. Any internal tools built then integrate with the SSO service to allow easy access for the team as a whole.

**Launchpad**
A software release platform specifically built for FusionCMS v5. This has multiple responsibilities in the life cycle of the CMS, including generating license keys, generating changelogs based off of github milestones and closed issues, publishing tagged releases on GitHub, storing and serving version downloads, and tracking internal exception logs from supported websites to notify the support team of issues to resolve in a timely fashion.

[**Music**](https://github.com/kaidesu/music)
A self-hosted music server, fashioned after Spotify and used to host and stream my personal music library.

## Archived
These projects have been archived from production use; mostly from the inability to dedicate time to maintaining them. Regardless, most of these are still usable in one form or another.

[**Tengu**](https://github.com/tengu-framework/tengu)
A learning endevour to deep-dive how popular web frameworks (CodeIgniter, Laravel) process requests and return responses. I'm still very proud of this work and hope to one day rebuild this using Ghost. A variation of this once powered a small set of websites built at efelle creative.

[**Proton**](https://github.com/proton-ui/proton)
An elegant collection of renderless Vue.js UI components. I really like the approach of renderless components used for UI and UX. Proton provided the API, leaving you to roll your own styles or make use of utility-first CSS frameworks, such as Tailwind, to fit your project and needs.

[RiveScript PHP Interpreter](https://github.com/axiom-labs/rivescript-php)
A RiveScript interpreter for PHP. I never finished this one - but got it to the point to support the basics of the scripting language. RiveScript is a simple scripting language to create the "brain" of chatbots. It can be used to craete some cleaverly designed scripts to cover a lot of use cases. I thought it would be great for server bots — [blog post](/2018/01/rivescript-development-log-part-1)

[Codex](https://github.com/codex-project/codex)
An easy to use file-based documentation platform using Laravel. Content is stored in markdown files with a clean theme to instantly get up and running with beautiful documentation. One of the key features was its "drivers". Codex supported two out of the box; `local` and `git`. Local read from a `local` directory on your server, while `git` dynamically cloned and kept documentation up to date stored within a Git repository. I turned this project over to Robin Radic to continue development in 2016.

**Hermes**
A closed-source internal ticketing system built for efelle creative. We very briefly used it to track internal support requests; from server provision requests to restocking coffee in the kitchen. This was replaced by GitHub and their issue board feature.