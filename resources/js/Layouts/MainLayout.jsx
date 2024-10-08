import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import NavLink from '@/Components/NavLink';
import { Link } from '@inertiajs/react';
import { useState } from 'react';

export default function MainLayout({ children }) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    return (
        <div className="min-h-screen bg-gray-100">
            <nav className="bg-white border-b border-gray-100">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16">
                        <div className="flex">
                            <div className="shrink-0 flex items-center">
                                <Link href="/">
                                    <img className="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" src="https://storage.fahrigunadi.dev/images/logo.png" alt="logo" />
                                </Link>
                            </div>

                            <div className="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink href={route('komisi-penjualan.index')} active={route().current('komisi-penjualan.index')}>
                                    Komisi Penjualan
                                </NavLink>

                                <NavLink href={route('marketing.index')} active={route().current('marketing.index')}>
                                    Marketing
                                </NavLink>

                                <NavLink href={route('penjualan.index')} active={route().current('penjualan.*')}>
                                    Penjualan
                                </NavLink>
                            </div>
                        </div>

                        <div className="-me-2 flex items-center sm:hidden">
                            <button
                                onClick={() => setShowingNavigationDropdown((previousState) => !previousState)}
                                className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg className="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        className={!showingNavigationDropdown ? 'inline-flex' : 'hidden'}
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        className={showingNavigationDropdown ? 'inline-flex' : 'hidden'}
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div className={(showingNavigationDropdown ? 'block' : 'hidden') + ' sm:hidden'}>
                    <div className="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink href={route('komisi-penjualan.index')} active={route().current('komisi-penjualan.index')}>
                            Komisi Penjualan
                        </ResponsiveNavLink>

                        <ResponsiveNavLink href={route('marketing.index')} active={route().current('marketing.index')}>
                            Marketing
                        </ResponsiveNavLink>

                        <ResponsiveNavLink href={route('penjualan.index')} active={route().current('penjualan.*')}>
                            Penjualan
                        </ResponsiveNavLink>
                    </div>
                </div>
            </nav>

            <main>{children}</main>
        </div>
    );
}
