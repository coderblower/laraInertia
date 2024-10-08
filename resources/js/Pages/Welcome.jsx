
import { Head, Link } from '@inertiajs/react';
import GuestLayoutTwo from '@/Layouts/GuestLayoutTwo';



export default function Welcome({ auth, laravelVersion, phpVersion, pizzas }) {

    console.log()
    return (

        <>
        <Head title="Lara pizza corner "/>

        <GuestLayoutTwo auth={auth} laravelVersion={laravelVersion} phpVersion={phpVersion}>

            <div className='mx-auto max-w-screen-sm text-center mb-8 lg:mb-16'>

                <h2 className='mb-4 text-4xl tracking-tight font-extrabold text-gray-400 dark:text-white'>
                    Lara Pizza Corner                </h2>

                    <p className='font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400'>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quae, atque ipsam voluptatibus in ad rem pariatur quia totam dolores fugiat quas recusandae perferendis veniam possimus beatae ut numquam officia?
                    </p>

            </div>

            <div className="grid gap-6 lg:grid-cols-2 lg:gap-8 mx-auto">
                {pizzas.data.length>0 && pizzas.data.map((data)=>(
                    <div key={data.id} className='grid gap-6 lg:grid-cols-2 lg:gap-8 mx-auto bg-slate-200'>
                        <div>
                            <img src={data.image} alt="" />
                        </div>
                        <div className='flex items-center justify-center flex-col'>
                            <h2 className='pb-5 font-bold text-3xl'>{data.name}</h2>
                            <p className=' font-bold pb-2'>sizes : <span className=' font-light text-xl'>{data.size.join` , `}</span> </p>
                            <p className=' font-bold pb-2'>price  taka : <span className='font-light'>{data.price}</span> </p>

                            <ul className=' mt-4'>
                                <Link className='  border-2 p-3 rounded-md border-orange-600 '
                                    href={route('buy_pizza', data.id)}
                                >

                                    Buy Pizza
                                </Link>
                            </ul>
                        </div>

                      </div>
                ))}
           </div>
        </GuestLayoutTwo>
        </>
    );
}
