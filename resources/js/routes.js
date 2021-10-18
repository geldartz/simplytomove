export default [
    // PAGES
    { path: '/', component: require('./components/Page/Homepage.vue').default },

    // ADMIN
    { path: '/panel/admin-dashboard', component: require('./components/Admin/Dashboard.vue').default },
    { path: '/panel/settings-membership', component: require('./components/Admin/Settings/MembershipSettings.vue').default },
    { path: '/panel/settings-miscellaneous', component: require('./components/Admin/Settings/Miscellaneous.vue').default },
    

    { path: '/panel/post-an-ad', component: require('./components/Customer/PostAd.vue').default },
    { path: '/panel/my-ad', component: require('./components/Customer/MyAdd.vue').default },
    { path: '/panel/emails', component: require('./components/Customer/Email.vue').default },
    { path: '/panel/chat', component: require('./components/Customer/Chat.vue').default },
    { path: '/panel/dashboard', component: require('./components/ExampleComponent.vue').default },

    { path: '/panel/pricing', component: require('./components/Admin/Settings/Pricing.vue').default },
    { path: '/panel/others', component: require('./components/Admin/Settings/Others.vue').default },
    

    { path: '/panel/profile', component: require('./components/Profile.vue').default },
    { path: '/panel/developer', component: require('./components/Developer.vue').default },
    { path: '/panel/users', component: require('./components/Users.vue').default },
    { path: '/panel/products', component: require('./components/product/Products.vue').default },
    { path: '/panel/product/tag', component: require('./components/product/Tag.vue').default },
    { path: '/panel/product/category', component: require('./components/product/Category.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default }
];
