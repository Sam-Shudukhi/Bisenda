# Bisenda
Marketing solutions for businesses and stores to grow customer base through deals/coupons, customer subscriptions, broadcasting latest news, reservations, and more. Businesses/Stores list their business and gain all marketing accessibilities at no cost. 
Bisenda is an entirely new system and a separate identity that stands on its own. However, there are a few aspects of Bisenda are inspired from other popular online telephone directory of businesses and reviews/reservations such as YellowPages and Yelp.

[Demo](https://bis-up.000webhostapp.com)

- Tools and Languages:
* Built on a LAMP environment.
* HTML5.
* CSS3.
* jQuery.
* AJAX.
* JavaScript.
* Bootstrap.
* W3.
* PHP.
* MySql.
* Codeigniter Framework.

- Design Patterns:
* MVC.
* Factory.
* Observer.

- Types of users:
1. Guests.
2. Individual user account.
3. Business Owner account.
4. Admin

- Functional Requirements 
* Guests:
1. Can browse home page and search for businesses.
2. Can view/open a listing of a business.
3. Can contact us.
4. Signup as registered user or business owner.
5. Can report inappropriate content by contact us.

* Member (Individual   user):
1. Can perform all tasks done by a guest plus,
2. Can rate a business, write reviews, and remove them.
3. Can report inappropriate reviews, media, contents, etc. by contact us.
4. Can reserve if a restaurant offers such services.
5. Can cancel reservation.
6. Can leave a note about a business for future reference (only viewed by the user).
7. Can subscribe to a business to receive special messages and deals.
8. With subscription, deals are present in subscriber’s profile. User can unsubscribe to a
business and broadcastings/deals are gone from their profile.
9. Can contact support through contact us.
10. Can confirm their accounts through a verification link sent by email.

* Member (Business):
1. Can list a business and add/edit/remove business details (working hours, etc).
2. Can upload photos for menus, store, services, etc.
3. If business is a restaurant, then is able to add amounts of table in store for
reservation (4 seaters, 2 seaters, booth or bar).
4. Can approve reservations,
5. Can add sale/promotion/coupons with open dates or with expiry date.
6. Can broadcast a message to all subscribers regarding new deals or new updates or
for any purpose.
7. Can contact support through contact us.
8. Can confirm their accounts through a verification link sent by email.(different from
store verification).

* Administer:
1. Can verify businesses and stores.
2. Can approve user reviews and rates.
3. Can contact user by sending email.
4. Can contact business by sending email.


* Software Quality Requirements:
         * Qualities Regarding Guests:
- Correctness
Search engine: provides exactly the items what a user wants to find. Including a list of items that are similar to the searched for item.
 
- User Friendliness
Home page starts with a full screen search area for simplicity and ease of use.
Home page includes all main features. Search area along with a header that features contact us, deals, user sign-up, business sign-up, and all logins, including administration login.
Simplified sign up processes. 

        * Qualities Regarding Individual User:
- Correctness
Needed to keep flow of proper responses among data, bookings and all action-driven features.
Critical actions such as insertions, deletions, and updates require meaningful responses even if not successful.

- Robustness
Employed to make use of proper error messages when wrong login credentials are entered.
Login is required to use any user-action to ensure all availability of sessions and required fields to deliver successful   responses or actions.
Denied access when user tries to manipulate url. Such action prevents users from removing reviews of other users.

- User Friendliness
Mostly menu-driven design.
High volume of icon use rather than textual contents.
Simplified dashboard that occupies quick links that are of user interests.

- Security
User credentials, information, bookings, location, comments, ratings, etc shouldn’t be accessed or manipulated by intruders.
Protection against XSS, injections, and CSRF in all used forms. 
       
       * Qualities   Regarding   Business   Owners:
- Correctness
Functions in business role such as updating operational hours, updating booking schedule, uploading a media file, etc   require proper responses.
Employed to raise insurance among taking any action with proper responses whether an action successes or fails.

- Robustness
Interactive and descriptive alerts are presented in response to all kinds of improper procedures such as missing important   fields or a login is required to take action.
Members are denied from manipulating urls to prevent acts such as editing or removing another business’s deals or coupons.

- User Friendliness
A profile for each business account to manage and navigate through services.
A quick-links dashboard with heavy icon use that describe functionality for interaction and quick navigation.
Actual clocks are used for updating operational hours of businesses that deliver high interactivity and simplicity.

- Security
All members forms and credentials are protected against XSS, injections, and CSRF.
All cookies and sessions are encrypted throughout the website.
- Use of md5 password encryption in the server.

       * Qualities   Regarding   Administration:
- Correctness
Admin verifying a business account should only be reflected on that business account.
Approval of user reviews and rates and all such actions require meaningful responses, regardless of the state of that action.

- Robustness
Confirm if successful or failed to operate a process properly.
Proper messages when view a business information in the case that some information are not present or entered yet. To ensure not any syntax or semantic errors would appear and cause a break-down.

- User   Friendliness
Display information to admins nicely, mostly tabulated data.
Simplified profile page with 3 commands (Approve, Verify, and Contact either
a user member or a business member).

- Security
Administers’ credentials are hashed before  they are stored.
Database processes are done securely to prevent malicious acts such as
injections.
