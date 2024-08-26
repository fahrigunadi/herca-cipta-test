import { router } from "@inertiajs/react";

export default function Pagination({ data }) {
    const paginate = (e) => {
        e.preventDefault();

        router.get(e.target.href, {}, {
            preserveScroll: true,
        });
    };

    return (
        <div className="w-full flex justify-between items-center mt-10 gap-5">
            <span className="text-sm sm:text-md">
                Menampilkan {data.from ?? 0} {data.to > 1 && `sampai ${data.to}`} dari {data.total ?? 0} Data
            </span>

            {(data.total > data.per_page) && (
                <div className="flex gap-x-1">
                    {data.links.map((item, index) => (
                        (item.url || item.label === "...") &&
                        <a
                            key={index}
                            href={item.url}
                            onClick={(e) => paginate(e)}
                            className={`flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 ${item.active ? 'bg-gray-300' : 'bg-white'}`}
                            dangerouslySetInnerHTML={{ __html: item.label }}
                            >
                        </a>
                    ))}
                </div>
            )}
        </div>
    );
}
