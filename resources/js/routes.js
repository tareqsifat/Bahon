import Admin from './components/admin/index';
import Website from './components/website/index';

export default{
    mode:history,

    routes: [
        {
            path: '/',
            Component: Website
        },
        {
            path: '/admin',
            Component: Admin
        }
    ]
}