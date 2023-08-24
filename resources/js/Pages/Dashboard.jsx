import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {Head} from '@inertiajs/react';
import PrimaryButton from "@/Components/PrimaryButton.jsx";
import SecondaryButton from "@/Components/SecondaryButton.jsx";
import { router } from '@inertiajs/react'

export default function Dashboard({auth, events}) {

    const changeReadUnReadStatus = (model, id, status) => {
        router.patch(route('event.update'), {model, id, status});
    }

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard"/>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <ul>
                        {
                            events?.followers ? (
                                events.followers.map((follower, i) => {
                                    return (
                                        <li key={i} className="my-3 border border-gray-300 p-3 rounded-lg">
                                            {
                                                follower.status_read ? (
                                                        <SecondaryButton className="mr-2"
                                                            onClick={() => changeReadUnReadStatus('follower', follower.id, false)}>
                                                            UnRead
                                                        </SecondaryButton>
                                                ) : (
                                                        <PrimaryButton className="mr-2"
                                                           onClick={() => changeReadUnReadStatus('follower', follower.id, true)}>
                                                            Read
                                                        </PrimaryButton>
                                                    )
                                            }
                                            <span>{follower.name} followed you!</span>
                                        </li>
                                    )
                                })
                            ) : ('')
                        }
                        {
                            events?.donations ? (
                                events.donations.map((donation, i) => {
                                    return (
                                        <li key={i} className="my-3 border border-gray-300 p-3 rounded-lg flex flex-row items-center">
                                            {
                                                donation.status_read ? (
                                                    <SecondaryButton className="mr-2"
                                                                     onClick={() => changeReadUnReadStatus('donation', donation.id, false)}>
                                                        UnRead
                                                    </SecondaryButton>
                                                ) : (
                                                    <PrimaryButton className="mr-2"
                                                                   onClick={() => changeReadUnReadStatus('donation', donation.id, true)}>
                                                        Read
                                                    </PrimaryButton>
                                                )
                                            }
                                            <span>{donation.name} donated {donation.amount} {donation.currency} to you!</span>
                                            <p className="ml-2">"{donation.donation_message}"</p>
                                        </li>
                                    )
                                })
                            ) : ('')
                        }
                        {
                            events?.merchSales ? (
                                events.merchSales.map((sale, i) => {
                                    return (
                                        <li key={i} className="my-3 border border-gray-300 p-3 rounded-lg">
                                            {
                                                sale.status_read ? (
                                                    <SecondaryButton className="mr-2"
                                                                     onClick={() => changeReadUnReadStatus('sale', sale.id, false)}>
                                                        UnRead
                                                    </SecondaryButton>
                                                ) : (
                                                    <PrimaryButton className="mr-2"
                                                                   onClick={() => changeReadUnReadStatus('sale', sale.id, true)}>
                                                        Read
                                                    </PrimaryButton>
                                                )
                                            }
                                            <span>{sale.name} bought {sale.amount} {sale.item_name}
                                                from you for {' '}
                                                {sale.price} USD</span>
                                        </li>
                                    )
                                })
                            ) : ('')
                        }
                        {
                            events?.subscribers ? (
                                events.subscribers.map((subscriber, i) => {
                                    return (
                                        <li key={i} className="my-3 border border-gray-300 p-3 rounded-lg">
                                            {
                                                subscriber.status_read ? (
                                                    <SecondaryButton className="mr-2"
                                                                     onClick={() => changeReadUnReadStatus('sale', subscriber.id, false)}>
                                                        UnRead
                                                    </SecondaryButton>
                                                ) : (
                                                    <PrimaryButton className="mr-2"
                                                                   onClick={() => changeReadUnReadStatus('sale', subscriber.id, true)}>
                                                        Read
                                                    </PrimaryButton>
                                                )
                                            }
                                            <span>{subscriber.name} subscribed to you!</span>
                                        </li>
                                    )
                                })
                            ) : ('')
                        }
                    </ul>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}


/*
                            // events.map((event, i)=>{
                            //     return (
                            //         <li key={i}>
                            //             {
                            //                 event?.name ? (<span>{event.name}</span>) : ('')
                            //             }
                            //             {
                            //                 event?.item_name ? (<span>{event.item_name}</span>) : ('')
                            //             }
                            //             {
                            //                 event?.tier_id ? (<span>{event.tier_id}</span>) : ('')
                            //             }
                            //             {
                            //                 event?.amount ? (<span>{event.amount}</span>) : ('')
                            //             }
                            //             {
                            //                 event?.currency ? (<span>{event.currency}</span>) : ('')
                            //             }
                            //             {
                            //                 event?.donation_message ? (<span>{event.donation_message}</span>) : ('')
                            //             }
                            //             {
                            //                 event?.price ? (<span>{event.price}</span>) : ('')
                            //             }
                            //         </li>
                            //     )
                            // })

                            // events.donations.map((donation, i) => {
                            //     return (
                            //         <li key={i}>
                            //             <span>{item.name} donated {donation.amount} {donation.currency} to you!</span>
                            //             <p>"{donation.donation_message}"</p>
                            //         </li>
                            //     )
                            // })*/
