---
title: "Beautify Sublime Text 3"
publishAt: 2014-08-06
draft: false
---

![Screenshot](/posts/beautify_sublime_text.png)

Sublime Text is an incredibly flexible and powerful text editor used by many developers today. I'm going to be looking at "beautifying" Sublime here, as it only makes sense that we'd like it if the tool we had to stare at for 8+ hours a day looked good.

Please keep in mind though that I will be leaning a little more towards to what I like as far as setting up Sublime Text. There are a lot of settings and tweaks one can make to Sublime, and every one will have their own unique preferences. So if there's something you don't agree with here, or simply don't like and prefer another setting, that's great! Please experiment and find what suits you and your of development.

Before we begin, the only prerequisite I have is that you have the Package Control plugin installed, which can be found [here](https://sublime.wbond.net/installation). If you have that installed, great! Let's move on.

## User Settings
First things first, I'll be going over some user settings I use that I think clean up the look and feel of Sublime. Your user settings can be found by navigating to Preferences → Settings - User.

### Always show minimap viewport

```json
"always_show_minimap_viewport": true,
```

I rely on the minimap a lot to quickly navigate through a file, so I like it showing all the time. It's easy to pick up on the blocky pattern produced by the way your code is formatted, and use that to quickly get your bearings if you're working within a large file.

### Bold folder labels

```json
"bold_folder_labels": true,
```

If there's one thing that Sublime is lacking, it's the ability to spruce up the sidebar navigation. I'd love for filetype specific filename colors and icons to help distinguish between files in the sidebar navigation - but as of now it's not possible (maybe in Sublime Text 4!?), so bolding the folder labels helps a tiny bit.

### Caret style

```json
"caret_style": "phase",
```

`caret_style` will change the look and feel of the caret in the editing portion of Sublime. I'm a fan of "phase" which will sort of "fade" the caret in and out rather than the default blinking look. Other options to choose from are smooth (default), blink, wide, and solid. Give them all a try and see what you like best.

### Caret size

```json
"caret_extra_top": 3,
"caret_extra_bottom": 3,
```

This setting goes in line with a setting I'll be mentioning below. But, this will extend the length of the caret by `x` pixels on top and bottom.

### Show fold buttons

```json
"fade_fold_buttons": false,
```

When I'm working, especially in larger files, I like to fold the code I'm not going to be working with down to lessen the clutter on my screen. Setting this option to false will always show the code folding arrows within the gutter of Sublime for easy reference.

### Font

```json
"font_face": "Ubuntu Mono",
"font_size": 13,
```

I'm a fan of the Ubuntu Mono font, but other good choices are Monaco, Source Code Pro, and even Consolas.

### Highlight current line

```json
"highlight_line": true,
```

Highlights the current line you're working on.

### Line padding

```json
"line_padding_bottom": 6,
"line_padding_top": 6,
```

These two settings were a huge game changer for me. Adding padding between the lines of text within the text editor really make everything so much easier to read and navigate. 6 may be too much for some, but generally between 4 and 6 seems to be the sweet spot for most. This is also the setting that I use in tangent with the aforementioned `caret_extra` settings.

### Margin

```json
"margin": 10,
```

This is a recently new setting that was brought to my attention. This setting adds a bit of space between your code and the gutter. `10` seems to be a good medium here.

### Overlay scroll bars

```json
"overlay_scroll_bars": "enabled",
```

Use the overlay scroll bars, to minimize the clutter on your screen.

## Color Scheme and UI
I like a minimalist look to things. So with that, I find both the color schemes and parented UI themes created by Dayle Rees [here](https://sublime.daylerees.com/) to be absolutely perfect. All of these can be easily installed through Package Control by searching for the Dayle Rees Color Schemes package. You will then have access to all the color schemes (which I do switch through on an almost daily basis) and accompanying UI theme for each color scheme.

> Do note that you'll need to install the Spacegray UI theme through package control before you're able to use the accompanying UI themes provided in the bundle.

So, my favorite color scheme is juicy. So after switching to the juicy color scheme, I can use the accompanying UI theme by opening my user settings again and setting the following:

```json
"theme": "juicy.sublime-theme",
```

And voila! Your text editor should look like the one in the screenshot at the head of this post.

That wraps things up for me. There are a lot more options and settings to monkey around with than what was covered here, so I do encourage you to look at the available options and mess around with things and see what you like.

To leave things off, here's my complete user preference file:

```json
{
    "always_show_minimap_viewport": true,
    "bold_folder_labels": true,
    "caret_extra_bottom": 3,
    "caret_extra_top": 3,
    "caret_style": "phase",
    "color_scheme": "Packages/Dayle Rees Color Schemes/sublime/juicy.tmTheme",
    "fade_fold_buttons": false,
    "font_face": "Ubuntu Mono",
    "font_size": 13,
    "highlight_line": true,
    "ignored_packages":
    [
        "Vintage"
    ],
    "line_padding_bottom": 6,
    "line_padding_top": 6,
    "margin": 10,
    "overlay_scroll_bars": "enabled",
    "theme": "juicy.sublime-theme"
}
```