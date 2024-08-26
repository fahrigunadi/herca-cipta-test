import React, { useCallback, useEffect, useState } from 'react';
import { router } from '@inertiajs/react';
import debounce from 'lodash.debounce';
import TextInput from './TextInput';

const searchParams = new URLSearchParams(window.location.search);

export default function Searchinput() {
    const [query, setQuery] = useState(searchParams.get('search') || '');

    const handleChange = (e) => {
        const value = e.target.value;
        setQuery(value);
        debouncedSearch(value);
    };

    const debouncedSearch = useCallback(
        debounce((searchQuery) => {
            searchParams.set('search', searchQuery);
            searchParams.delete('page');

            router.get('?' + searchParams.toString(), {}, {
                preserveState: true
            });
        }, 300),
        []
    );

    useEffect(() => {
        return () => {
            debouncedSearch.cancel();
        };
    }, [debouncedSearch]);

    const submit = (e) => {
        e.preventDefault();

        debouncedSearch(query);
    };

    return (
        <form onSubmit={submit}>
            <TextInput id="search" className="md:w-80" value={query} onChange={handleChange} type="text" name="search" placeholder="Search..."/>
        </form>
    )
}

