---
extends: _layouts.post
ogtype: article
image: https://anonaddy.com/assets/img/status-page.jpg
section: content
title: A new backup mail server and why I've moved to a managed database
date: 2021-04-23
description: This post gives a few more details regarding the new backup mail server and the reasons why I've moved to a managed database solution.
categories: [updates]
---

This post gives a few more details regarding the new backup mail server and the reasons why I've moved to a managed database solution.

## The new mail server

Having a robust backup system is something that has been on my radar for quite some time. I've been exploring several methods to safeguard the AnonAddy email delivery should the server go offline, something that would continue to deliver emails and prevent the service from being disrupted. One of the reasons it's taken this long is because I was paralyzed by indecision whilst doing research and testing different database solutions that both mail servers would be able to connect to.

Once I was able to make a decision on the database, it allowed me to proceed with the new backup mail server for which I chose [UpCloud](https://upcloud.com/signup/?promo=D5H33W) (referral link). The new mail server has the hostname `mail2.anonaddy.me` and is hosted by Upcloud in their Poland data centre.

## Moving to a managed database

In the event of a server going offline, I needed to ensure that the database and the main server were separate. Previously, if there had been any temporary server failure, access to the database would have also been lost. By separating the two, this will ensure that any problems with the main server do not impact the continuation of the service. The backup server will be able to still access the database and continue to forward emails as normal.

Whilst I was aware that managed database services already existed with companies such as Digital Ocean and Amazon's Managed Database solution, it was imperative that I found a service that had the same focus on privacy as AnonAddy. Having struggled to find an option that I felt I could trust with AnonAddy's data, I decided to explore other avenues.

This led me to consider setting up a [MariaDB Galera Cluster](https://mariadb.com/kb/en/what-is-mariadb-galera-cluster/) of 3 servers. This would have allowed you to write database transactions to any node in the cluster and if any one server went offline the database can continue to work as normal.

I spent a long while researching the Galera Cluster and testing it out with different server setups. I wanted to have the 3 servers in different data centres to protect against a disaster such as the fire at OVH's facility in Strasbourg, France on 10th March 2021.

I had a couple of concerns about continuing down this route, the first of which was the potential latency between the 3 servers since all nodes in a Galera Cluster remain in sync as each transaction is committed. Another thing I was concerned about was the potential overhead of having to manage 3 servers with a reasonably complex cluster setup that would need monitoring and updating etc. I was worried that I'd be spending more time doing server admin than actually working on new features for AnonAddy.

Having not yet found any better alternative, I was almost about to commit to going with the cluster setup when I saw this blog post by Jack Ellis from Fathom Analytics - [Building the world's fastest website analytics](https://usefathom.com/blog/worlds-fastest-analytics). That blog post really resonated with me and shifted my mindset. I'm not a database expert and so I don't want to be bogged down managing, monitoring and maintaining the database.

That's when I found [aiven](https://aiven.io/). Their managed database solution looked exactly like what I'd been searching for, and furthermore they allowed you to chose UpCloud as the platform upon which it would be installed. They also had a very high SLA and a high availability option.

I chose UpCloud's Amsterdam data centre in order to have the lowest latency for the main mail server. Migration from the current database was quick and easy and only took about 3 minutes to complete (any emails were deferred in this period).

It felt like a huge weight off my shoulders when I'd finished the migration and no longer had to worry about the database, and I could then finish provisioning the backup mail server and make that live too.

Now I'll be able to spend more time focusing on new features for AnonAddy that are on the [roadmap](https://github.com/anonaddy/anonaddy/projects/1) which is the thing I enjoy doing the most.

## The new status page

I've also just added a new status page that you can find at [status.anonaddy.com](https://status.anonaddy.com/). This allows you to quickly check the current status of the landing page, web application, main mail server and the new backup mail server.

It's powered by [Oh Dear](https://ohdear.app/) which is awesome and is also created using Laravel.

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/status-page.jpg" alt="Status page" title="Status page">
</div>

## A new domain

I recently added another new domain that is available for anyone on a paid plan. I won't actually be naming the new domain here because I don't want to publicly talk about it in hope that it can stay under the radar.

Users on paid plans can use the new domain as a shared domain *@newdomain.com and also as a standard domain *@johndoe.newdomain.com, where `johndoe` is the account's username.

## Feedback and suggestions

If you have any feedback or suggestions please just [get in touch](/contact/) and make sure to sign up to the newsletter if you'd like to receive updates on new features!
