---
title: "Free, Open-source Anonymous Email Forwarding"
width: full
---

@extends('_layouts.master')

@section('body')

<!--Hero-->
<div class="bg-white">
    <div class="relative isolate overflow-hidden bg-gradient-to-b from-indigo-100/20">
        <div class="mx-auto max-w-7xl pb-24 pt-10 sm:pb-32 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:py-48">
            <div class="px-6 lg:px-0 lg:pt-4">
                <div class="mx-auto max-w-2xl">
                    <div class="max-w-lg">
                        <div class="mt-24 sm:mt-32 lg:mt-16">
                            <a href="/blog/anonaddy-has-rebranded-as-addy-io" class="inline-flex items-center space-x-2">
                                <span class="rounded-full bg-indigo-600/10 px-3 py-1 text-sm font-semibold leading-6 text-indigo-600 ring-1 ring-inset ring-indigo-600/10">AnonAddy
                                    is now addy.io →</span>
                            </a>
                        </div>
                        <h1 class="mt-10 text-4xl font-bold tracking-tight text-grey-900">Anonymous Email Forwarding
                        </h1>
                        <p class="mt-6 text-lg leading-8 text-grey-600">Protect your real email address using email
                            aliases</p>
                        <div class="mt-10 flex items-center space-x-4">
                            <a href="{{ $page->appUrl }}/register" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
                                Started Now</a>
                            <a href="https://github.com/anonaddy/anonaddy" target="_blank" rel="nofollow noreferrer noopener" class="inline-flex items-center">
                                Open-source
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -2 24 24" width="20" height="20" preserveAspectRatio="xMinYMin" class="fill-current inline-block align-top ml-1.5">
                                    <path d="M18.88 1.099C18.147.366 17.265 0 16.233 0H3.746C2.714 0 1.832.366 1.099 1.099.366 1.832 0 2.714 0 3.746v12.487c0 1.032.366 1.914 1.099 2.647.733.733 1.615 1.099 2.647 1.099H6.66c.19 0 .333-.007.429-.02a.504.504 0 0 0 .286-.169c.095-.1.143-.245.143-.435l-.007-.885c-.004-.564-.006-1.01-.006-1.34l-.3.052c-.19.035-.43.05-.721.046a5.555 5.555 0 0 1-.904-.091 2.026 2.026 0 0 1-.872-.39 1.651 1.651 0 0 1-.572-.8l-.13-.3a3.25 3.25 0 0 0-.41-.663c-.186-.243-.375-.407-.566-.494l-.09-.065a.956.956 0 0 1-.17-.156.723.723 0 0 1-.117-.182c-.026-.061-.004-.111.065-.15.07-.04.195-.059.378-.059l.26.04c.173.034.388.138.643.311a2.1 2.1 0 0 1 .631.677c.2.355.44.626.722.813.282.186.566.28.852.28.286 0 .533-.022.742-.065a2.59 2.59 0 0 0 .585-.196c.078-.58.29-1.028.637-1.34a8.907 8.907 0 0 1-1.333-.234 5.314 5.314 0 0 1-1.223-.507 3.5 3.5 0 0 1-1.047-.872c-.277-.347-.505-.802-.683-1.365-.177-.564-.266-1.215-.266-1.952 0-1.049.342-1.942 1.027-2.68-.32-.788-.29-1.673.091-2.652.252-.079.625-.02 1.119.175.494.195.856.362 1.086.5.23.14.414.257.553.352a9.233 9.233 0 0 1 2.497-.338c.859 0 1.691.113 2.498.338l.494-.312a6.997 6.997 0 0 1 1.197-.572c.46-.174.81-.221 1.054-.143.39.98.424 1.864.103 2.653.685.737 1.028 1.63 1.028 2.68 0 .737-.089 1.39-.267 1.957-.177.568-.407 1.023-.689 1.366-.282.343-.633.63-1.053.865-.42.234-.828.403-1.223.507a8.9 8.9 0 0 1-1.333.235c.45.39.676 1.005.676 1.846v3.11c0 .147.021.266.065.357a.36.36 0 0 0 .208.189c.096.034.18.056.254.064.074.01.18.013.318.013h2.914c1.032 0 1.914-.366 2.647-1.099.732-.732 1.099-1.615 1.099-2.647V3.746c0-1.032-.367-1.914-1.1-2.647z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-20 sm:mt-24 md:mx-auto md:max-w-2xl lg:mx-0 lg:mt-0 lg:w-screen">
                <div class="absolute inset-y-0 right-1/2 -z-10 -mr-10 w-[200%] skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 md:-mr-20 lg:-mr-36" aria-hidden="true"></div>
                <div class="shadow-lg md:rounded-3xl">
                    <div class="bg-indigo-600 [clip-path:inset(0)] md:[clip-path:inset(0_round_theme(borderRadius.3xl))]">
                        <div class="absolute -inset-y-px left-1/2 -z-10 ml-10 w-[200%] skew-x-[-30deg] bg-indigo-100 opacity-20 ring-1 ring-inset ring-white md:ml-20 lg:ml-36" aria-hidden="true"></div>
                        <div class="relative px-6 pt-8 sm:pt-16 md:pl-16 md:pr-0">
                            <div class="mx-auto max-w-2xl md:mx-0 md:max-w-none">
                                <img class="-mr-6" src="/assets/img/addy-app.svg" alt="Web Application">
                            </div>
                            <div class="pointer-events-none absolute inset-0 ring-1 ring-inset ring-black/10 md:rounded-3xl" aria-hidden="true"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-white sm:h-32"></div>
    </div>
</div>

<section class="bg-white py-8">
    <div class="container max-w-5xl mx-auto m-8 border-b border-grey-100">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-grey-800">How Does It Work?</h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-6">
                    <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">1. Register Your Username</h3>
                    <p class="text-grey-600 mb-4">Let's say your username is <b>johndoe</b>. You can now use
                        *@johndoe.anonaddy.com (or .me) as your email. Where * denotes any valid local part for an email
                        address.</p>

                    <p class="text-grey-600 mb-4">If you would like to remain anonymous choose a username that is not
                        linked to your real name or identity and that you haven't used anywhere else.</p>

                    <p class="text-grey-600">You can also create aliases at <b>shared domains</b> if you are concerned
                        about others linking alias ownership to you.</p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/register.svg" alt="Register">
                </div>
            </div>

            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/email_aliases.svg" alt="Email Aliases">
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">2. Create Aliases</h3>
                        <p class="text-grey-600 mb-4">Either <b>on the fly</b> or <b>generated</b> beforehand. Next time
                            you are signing up to a website or newsletter, simply make up a new alias and enter that
                            instead of your real email address.</p>
                        <p class="text-grey-600 mb-4">For example, if you are on vuejs.org and you want to sign up to
                            their newsletter you could simply enter <b>vuejs@johndoe.anonaddy.com</b> (or .me).</p>
                        <p class="text-grey-600 mb-4">We'll automatically create the alias in your dashboard as soon as
                            it receives its first email. You can reply to emails and send from aliases anonymously too!
                        </p>
                    </div>
                </div>

            </div>

            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-6">
                    <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">3. Manage Aliases</h3>
                    <p class="text-grey-600 mb-4">Let's say a spammer gets hold of one of your aliases and starts
                        sending unsolicited email to it. You can simply toggle a switch in your dashboard and deactivate
                        that alias.</p>
                    <p class="text-grey-600 mb-4">Our system will then silently <b>discard</b> any further emails and
                        you won't be forwarded anything else for that alias.</p>
                    <p class="text-grey-600 mb-4">You can also delete the alias. Then our system will <b>reject</b> any
                        emails and respond with an error.</p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/dashboard.svg" alt="Manage Aliases">
                </div>
            </div>

    </div>
</section>

<section class="bg-white py-8">
    <div class="container max-w-5xl mx-auto m-8 border-b border-grey-100">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-grey-800">Features You'll Love</h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/browsers.svg" alt="Browser Extension">
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">Browser Extension</h3>
                        <p class="text-grey-600 mb-4">Generate new aliases in a couple of clicks straight from your
                            browser using the <a href="https://github.com/anonaddy/browser-extension" class="text-indigo-700 font-bold" target="_blank" rel="nofollow noopener noreferrer">open-source</a> browser extension.</p>
                        <p class="text-grey-600 b-4">The extension is available for download on <a href="https://addons.mozilla.org/en-GB/firefox/addon/addy_io/" class="text-indigo-700 font-bold" target="_blank" rel="nofollow noopener noreferrer">Firefox</a> and <a href="https://chrome.google.com/webstore/detail/addyio-anonymous-email-fo/iadbdpnoknmbdeolbapdackdcogdmjpe" class="text-indigo-700 font-bold" target="_blank" rel="nofollow noopener noreferrer">Chrome</a>!</p>
                        <p class="text-grey-600 mb-4">Also available on other chromium based browsers such as Brave and
                            Vivaldi.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-6">
                    <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">GPG/OpenPGP Encryption</h3>
                    <p class="text-grey-600 mb-4">Bring your own GPG/OpenPGP public keys and add them per recipient.
                    </p>

                    <p class="text-grey-600">You can then easily toggle encryption on and off. With encryption on, all
                        forwarded messages will be encrypted with your public key. Only you will be able to decrypt them
                        with the corresponding private key. You can even hide and encrypt the email subject!</p>

                    <p class="text-grey-600">This is great if you are using Gmail or Outlook and wish to prevent any
                        inbox snooping.</p>

                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/fingerprint.svg" alt="GPG/OpenPGP Encryption">
                </div>
            </div>

            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/domains.svg" alt="Custom Domains">
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">Custom Domains</h3>
                        <p class="text-grey-600 mb-4">If you have your own domain you can add it and use it exactly
                            like your username subdomain aliases e.g. <b>alias@example.com</b>.</p>
                        <p class="text-grey-600 b-4">You can also enable or disable the <b>catch-all</b> functionality
                            for each of your domains.</p>
                        <p class="text-grey-600 mb-4">You can then manage your aliases and deactivate/delete any that
                            start receiving spam!</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-6">
                    <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">Blend Into The Crowd</h3>
                    <p class="text-grey-600 mb-4">If you don't like the fact that all your aliases contain your
                        username then you can generate random unique aliases from your dashboard.</p>
                    <p class="text-grey-600 mb-4">The generated aliases will look something like this
                        <b>x481n904@anonaddy.me</b> or <b>circus.waltz449@anonaddy.me</b>
                    </p>
                    <p class="text-grey-600 mb-4">This prevents anyone linking ownership of the alias to you.</p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/anonymous.svg" alt="UUID Aliases">
                </div>
            </div>

            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/mail.svg" alt="Reply to and Send from">
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">Reply To And Send From Aliases
                        </h3>
                        <p class="text-grey-600 mb-4">Reply <b>anonymously</b> to forwarded emails, the sender will
                            receive the email as if it has come from the alias.</p>
                        <p class="text-grey-600 mb-4">You can even initiate an email conversation by sending an email
                            from one of your aliases.</b></p>
                        <p class="text-grey-600 mb-4">Your real email address is <b>not revealed</b> when replying or
                            sending from an alias.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-6">
                    <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">Add Additional Usernames</h3>
                    <p class="text-grey-600 mb-4">You can add additional usernames to your account and use them exactly
                        like the one you signed up with.</p>
                    <p class="text-grey-600 mb-4">So if you signed up as johndoe you can add johnsmith as an additional
                        username and then use <b>anyalias@johnsmith.anonaddy.com</b> too.</p>
                    <p class="text-grey-600 mb-4">This can be used to compartmentalise your aliases. You could have a
                        username for work emails a different one for personal emails etc.</p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/usernames.svg" alt="Additional Usernames">
                </div>
            </div>

            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/recipients.svg" alt="Multiple Recipients">
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">Multiple Recipients Per Alias
                        </h3>
                        <p class="text-grey-600 mb-4">If you'd like an alias to go to more than one recipient you can
                            easily add multiple recipients from your dashboard.</p>
                        <p class="text-grey-600 mb-4">You can even add recipients to an alias as it is created by doing
                            <b>alias+2.3.4@user.anonaddy.com</b>
                        </p>
                        <p class="text-grey-600 mb-4">Where 2,3 and 4 are the keys for existing recipients in your
                            account.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-grey-800 font-bold leading-none mb-3">API Access</h3>
                        <p class="text-grey-600 mb-4">Manage your aliases, recipients, domains and additional usernames
                            using the addy.io API.</p>
                        <p class="text-grey-600 mb-4">In order to use the API you first need to generate an API access
                            token in your account settings.</p>
                        <p class="text-grey-600 mb-4"><a href="{{ $page->appUrl }}/docs/" class="text-indigo-700 font-bold">View API documentation</a></p>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <img class="w-full sm:h-64 mx-auto" src="/assets/img/api.svg" alt="API">
                </div>
            </div>

    </div>
</section>

<section id="pricing" class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-grey-800">Pricing</h1>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>
        </div>
        <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-grey-600">Simple plans. Simple prices.</p>

        <!-- xs to lg -->
        <div class="mx-auto mt-12 max-w-md space-y-8 sm:mt-16 lg:hidden">
            <section class="p-8">
                <h3 id="tier-free" class="text-sm font-semibold leading-6 text-grey-900">Free</h3>
                <p class="mt-2 flex items-baseline gap-x-1 text-grey-900">
                    <span class="text-4xl font-bold"><span class="currency-symbol">$</span>0</span>
                    <span class="text-sm font-semibold">/month</span>
                </p>
                <a href="{{ $page->appUrl }}/register" aria-describedby="tier-free" class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300">Sign
                    Up</a>
                <ul role="list" class="mt-10 space-y-4 text-sm leading-6 text-grey-900 list-none">
                    <li>
                        <ul role="list" class="space-y-4 list-none">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Unlimited Standard Aliases </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>10</b> Active Shared Domain Aliases </span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul role="list" class="space-y-4">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>1</b> Recipient (real email address) </span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul role="list" class="space-y-4">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>10Mb</b> Monthly Bandwidth Limit </span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            <section class="p-8">
                <h3 id="tier-lite" class="text-sm font-semibold leading-6 text-grey-900">Lite</h3>
                <p class="mt-2 flex items-baseline gap-x-1 text-grey-900">
                    <span class="text-4xl font-bold"><span class="currency-symbol">$</span>1</span>
                    <span class="text-sm font-semibold">/month</span>
                </p>
                <a href="{{ $page->appUrl }}/register" aria-describedby="tier-lite" class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300">Sign
                    Up</a>
                <ul role="list" class="mt-10 space-y-4 text-sm leading-6 text-grey-900">
                    <li>
                        <ul role="list" class="space-y-4">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Unlimited Standard Aliases </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>50</b> Active Shared Domain Aliases </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>5</b> Recipients (real email addresses) </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span>
                                    <b>1</b> Custom Domain
                                </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span>
                                    <b>1</b> Additional Username
                                </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span>
                                    <b>5</b> Rules
                                </span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul role="list" class="space-y-4">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>20</b> Anonymous Replies / Sends Per Day </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Access Paid Plan Settings </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Priority Email Queue </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> View / Download Failed Deliveries </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Option to Disable Catch-All </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>3 (soon to be 4)</b> Additional Alias Domains </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>100MB</b> Monthly Bandwidth Limit </span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul role="list" class="space-y-4">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Priority Support </span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            <section class="p-8 rounded-xl bg-grey-400/5 ring-1 ring-inset ring-grey-200">
                <h3 id="tier-pro" class="text-sm font-semibold leading-6 text-grey-900">Pro</h3>
                <p class="mt-2 flex items-baseline gap-x-1 text-grey-900">
                    <span class="text-4xl font-bold"><span class="currency-symbol">$</span>3</span>
                    <span class="text-sm font-semibold">/month</span>
                </p>
                <p class="text-xs text-grey-500 mb-0 font-normal">Billed Yearly, <span class="currency-symbol">$</span>4
                    Billed Monthly</p>
                <a href="{{ $page->appUrl }}/register" aria-describedby="tier-pro" class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 bg-indigo-600 text-white hover:bg-indigo-500">Sign
                    Up</a>
                <ul role="list" class="mt-10 space-y-4 text-sm leading-6 text-grey-900">
                    <li>
                        <ul role="list" class="space-y-4">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Unlimited Standard Aliases </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>Unlimited</b> Active Shared Domain Aliases </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>30</b> Recipient (real email addresses) </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span>
                                    <b>1</b> Custom Domain
                                </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span>
                                    <b>10</b> Additional Usernames
                                </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span>
                                    <b>20</b> Rules
                                </span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul role="list" class="space-y-4">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>100</b> Anonymous Replies / Sends Per Day </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Access Paid Plan Settings </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Priority Email Queue </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> View / Download Failed Deliveries </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Option to Disable Catch-All </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>3 (soon to be 5)</b> Additional Alias Domains </span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> <b>Unlimited</b> Monthly Bandwidth </span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul role="list" class="space-y-4">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                <span> Priority Support </span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
        </div>

        <!-- lg+ -->
        <div class="isolate mt-20 hidden lg:block">
            <div class="relative -mx-8">
                <div class="absolute inset-x-4 inset-y-0 -z-10 flex">
                    <div class="flex w-1/4 px-4 ml-3/4" aria-hidden="true">
                        <div class="w-full rounded-t-xl border-x border-t border-grey-900/10 bg-grey-400/5"></div>
                    </div>
                </div>
                <table class="w-full table-fixed border-separate border-spacing-x-8 text-left">
                    <caption class="sr-only">
                        Pricing plan comparison
                    </caption>
                    <colgroup>
                        <col class="w-1/4">
                        <col class="w-1/4">
                        <col class="w-1/4">
                        <col class="w-1/4">
                    </colgroup>
                    <thead>
                        <tr>
                            <td></td>
                            <th scope="col" class="px-6 pt-6 xl:px-8 xl:pt-8">
                                <div class="text-sm font-semibold leading-7 text-grey-900">Free</div>
                            </th>
                            <th scope="col" class="px-6 pt-6 xl:px-8 xl:pt-8">
                                <div class="text-sm font-semibold leading-7 text-grey-900">Lite</div>
                            </th>
                            <th scope="col" class="px-6 pt-6 xl:px-8 xl:pt-8">
                                <div class="text-sm font-semibold leading-7 text-grey-900">Pro</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><span class="sr-only">Price</span></th>
                            <td class="px-6 pt-2 xl:px-8">
                                <div class="flex items-baseline gap-x-1 text-grey-900">
                                    <span class="text-4xl font-bold"><span class="currency-symbol">$</span>0</span>
                                    <span class="text-sm font-semibold leading-6">/month</span>
                                </div>
                                <a href="{{ $page->appUrl }}/register" class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300">Sign
                                    Up</a>
                            </td>
                            <td class="px-6 pt-2 xl:px-8">
                                <div class="flex items-baseline gap-x-1 text-grey-900">
                                    <span class="text-4xl font-bold"><span class="currency-symbol">$</span>1</span>
                                    <span class="text-sm font-semibold leading-6">/month</span>
                                </div>
                                <a href="{{ $page->appUrl }}/register" class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300">Sign
                                    Up</a>
                            </td>
                            <td class="px-6 pt-2 xl:px-8">
                                <div class="flex items-baseline gap-x-1 text-grey-900">
                                    <span class="text-4xl font-bold"><span class="currency-symbol">$</span>3</span>
                                    <span class="text-sm font-semibold leading-6">/month</span>
                                </div>
                                <a href="{{ $page->appUrl }}/register" class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 bg-indigo-600 text-white hover:bg-indigo-500">Sign
                                    Up</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="colgroup" colspan="3" class="pb-4 text-sm font-semibold leading-6 text-grey-900 pt-8">
                                Features
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/10"></div>
                            </th>
                            <th>
                                <p class="text-xs text-grey-500 mb-0 text-center font-normal">Billed Yearly, <span class="currency-symbol">$</span>4 Billed Monthly</p>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Unlimited Standard Aliases
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Lite</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Pro</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Active Shared Domain Aliases
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">10</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">50</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">Unlimited</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Recipients (real email addresses)
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">1</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">5</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">30</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Custom Domains
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">1</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">20</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Additional Usernames
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">1</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">10</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Rules
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">5</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">20</div>
                            </td>
                        </tr>

                        <tr>
                            <th scope="colgroup" colspan="4" class="pb-4 text-sm font-semibold leading-6 text-grey-900 pt-16">
                                Usage
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/10"></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Anonymous Reply + Send From Daily Limit
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">20</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">100</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Access Paid Plan Settings
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Lite</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Pro</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Priority Email Queue
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Lite</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Pro</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                View / Download Failed Deliveries
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Lite</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Pro</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Option to Disable Catch-All
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Lite</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Pro</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Additional Alias Domains
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">3 (soon to be 4)
                                </div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">3 (soon to be 5)
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Monthly Bandwidth Limit
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">10MB</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">100MB</div>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <div class="text-center text-sm leading-6 text-grey-800 font-bold">Unlimited</div>
                            </td>
                        </tr>

                        <tr>
                            <th scope="colgroup" colspan="4" class="pb-4 text-sm font-semibold leading-6 text-grey-900 pt-16">
                                Support
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/10"></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row" class="py-4 text-sm font-normal leading-6 text-grey-900">
                                Priority Support
                                <div class="absolute inset-x-8 mt-4 h-px bg-grey-900/5"></div>
                            </th>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5 text-grey-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Not included in Free</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Lite</span>
                            </td>
                            <td class="px-6 py-4 xl:px-8">
                                <svg class="mx-auto h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <circle cx="10" cy="10" r="10" fill="#E0E8F9">
                                        </circle>
                                        <polyline stroke="#4055A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="6 10 8.667 12.667 14 7.333"></polyline>
                                    </g>
                                </svg>
                                <span class="sr-only">Included in Pro</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="bg-white">
    <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-grey-900 sm:text-4xl">Protect Your Privacy.<br>Eliminate
                Spam.</h2>
            <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-grey-600">Join thousands of others who are already
                protecting their privacy online and keeping their inboxes tidy.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ $page->appUrl }}/register" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Secure
                    Your Inbox Today
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block ml-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="relative isolate overflow-hidden bg-grey-900 px-6 py-24 shadow-2xl sm:rounded-3xl sm:px-24 xl:py-32">
            <img src="/assets/img/cover.jpg" alt="addy.io Newsletter Background" class="absolute inset-0 -z-10 brightness-[0.35] w-full h-full object-none">

            <div class="">
                <h2 class="mx-auto max-w-2xl text-center text-3xl font-bold tracking-tight text-white sm:text-4xl">Get
                    Product News & Updates</h2>
                <p class="mx-auto mt-2 max-w-xl text-center text-lg leading-8 text-grey-100">Sign up for our
                    newsletter.</p>
                <form action="https://news.anonaddy.com/subscribe" method="POST" accept-charset="utf-8" class="mx-auto mt-10 flex max-w-md gap-x-4">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6" placeholder="Enter your email">
                    <div class="hidden">
                        <label for="hp">HP</label>
                        <input type="text" name="hp" id="hp" />
                    </div>
                    <input type="hidden" name="list" value="JYLgy1unb31YYX3AW892Fxvg" />
                    <input type="hidden" name="subform" value="yes" />
                    <label for="gdpr" class="hidden">GDPR</label>
                    <input class="hidden" type="checkbox" name="gdpr" id="gdpr" checked />
                    <button type="submit" class="flex-none rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-grey-900 shadow-sm hover:bg-grey-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Notify
                        me</button>
                </form>
            </div>

        </div>
    </div>
</div>

@stop

@push('scripts')
<script>
    fetch("{{ $page->appUrl }}/default-currency").then((e => e.json())).then((e => {
        [...document.getElementsByClassName("currency-symbol")].forEach((n => n.innerText = e.currency))
    }));
</script>
@endpush