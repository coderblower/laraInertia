
import { Head, Link, useForm } from '@inertiajs/react';
import GuestLayoutTwo from "@/Layouts/GuestLayoutTwo";
import SelectInput from '@/Components/SelectInput';
import Checkbox from '@/Components/Checkbox';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import TextAreaInput from '@/Components/TextAreaInput';





const Buy = ({auth, laravelVersion, phpVersion, pizza}) => {


    const {
        data,
        setData,
        post,
        errors,
        processing,
        recentlySuccessful,
        setError,
    } = useForm({
        size:"",
        crust:"",
        toppings:pizza.toppings,
        name:"",
        address: "",
        pizzaId: pizza.id,
        payment_type:"cash",
        quantity:1,
        email:"",
        mobile:""
    });

    const handleToppingChange = (topping)=>{
        if( data.toppings.includes(topping)){
            setData("toppings", data.toppings.filter((t)=> t !== topping))
        } else {
            setData('toppings', [...data.toppings, topping])
        }
    }


    const validateEmailOrMobile = ()=>{
        if(!data.email && !data.mobile){
            setError('email', "email or mobile is required");
            setError('mobile', 'mobile or email is required');
            return false;
        }
        setError("email", null);
        setError("mobile", null);
        return true;
    };


    const createOrder = (e) => {
        e.preventDefault();
        if(validateEmailOrMobile()){
            post(route("buyPizzaByCash"), {
                onSuccess: ()=>{},
            });
        }
    }

    return (

        <>
        <Head title= {pizza.name} />

        <GuestLayoutTwo auth={auth} laravelVersion={laravelVersion} phpVersion={phpVersion}>

            <div>
                <h2>{pizza.name} </h2>
            </div>

            <div className="grid lg:grid-cols-2 gap-6 mx-auto">
                <div> <img src={pizza.image} alt="" /></div>
                <div>
                  <form method='POST' onSubmit={createOrder}>


                       <div className=" flex flex-col gap-5">
                        <div>
                                <InputLabel
                                    htmlFor = "quantity"
                                    value="Pizza Quantity"
                                />

                                <TextInput
                                    id="pizza_quantity"
                                    className="mt-1 block w-[70px]"
                                    type="number"
                                    value = {data.quantity}
                                    onChange = { (e) => {
                                        setData('quantity', parseInt(e.target.value, 10))
                                        console.log(data)
                                    }}

                                />

                                </div>
                            <div>

                            <InputLabel
                                htmlFor = "Size"
                                value="Size"
                            />

                                <SelectInput
                                id="size"
                                value={data.size}
                                options = { pizza.size}
                                onChange = {(e)=> {

                                    setData(
                                        "size",
                                        e.target.value
                                        )

                                    }
                                }
                                required
                            />

                            </div>

                            <div>
                            <InputLabel
                                htmlFor = "Crust"
                                value="Crust"
                            />

                                <SelectInput
                                id="size"
                                value={data.crust}
                                options = { pizza.crust}
                                onChange = {(e)=> {

                                    setData(
                                        "crust",
                                        e.target.value
                                        )

                                        console.log(data)

                                    }
                                }
                                required
                            />
                            </div>



                            <div>
                            <InputLabel
                                htmlFor = "toppings"
                                value="Toppings"
                            />

                              <div className='flex flex-wrap mt-2'>

                                {pizza.toppings.map((topping)=>(
                                    <label
                                            key={topping}
                                            className='mr-4 flex items-center'
                                        >
                                            <Checkbox
                                                checked = { data.toppings.includes(
                                                    topping
                                                )}

                                                onChange={()=>{
                                                        handleToppingChange(topping)
                                                        console.log(data)}
                                                }
                                            />

                                                <span className='ml-2'>{topping}</span>
                                        </label>
                                ))}
                              </div>
                            </div>

                            <div>
                            <InputLabel
                                htmlFor = "customer_name"
                                value="Customer Name"
                            />

                            <TextInput
                                id="customer_name"
                                className="mt-1 block w-full"
                                type="text"
                                value = {data.name}
                                onChange = { (e) => {
                                    setData('name', e.target.value)
                                    console.log(data)
                                }}

                            />

                            </div>



                            <div>
                            <InputLabel
                                htmlFor = "customer_address"
                                value="Customer Address"
                            />

                            <TextAreaInput
                                id="customer_Address"
                                className="mt-1 block w-full"
                                rows="6"
                                type="text"
                                value = {data.address}
                                onChange = { (e) => {
                                    setData('address', e.target.value)
                                    console.log(data)
                                }}

                            />

                            </div>


                            <div>
                            <InputLabel
                                htmlFor = "email"
                                value="Customer Email"
                            />

                            <TextInput
                                id="customer_email"
                                className="mt-1 block w-full"
                                type="text"
                                value = {data.email}
                                onChange = { (e) => {
                                    setData('email', e.target.value)
                                    console.log(data)
                                }}

                            />

                            </div>
                            <div>
                            <InputLabel
                                htmlFor = "mobile"
                                value="Customer Mobile"
                            />

                            <TextInput
                                id="customer_mobile"
                                className="mt-1 block w-full"
                                type="text"
                                value = {data.mobile}
                                onChange = { (e) => {
                                    setData('mobile', e.target.value)
                                    console.log(data)
                                }}

                            />

                            </div>

                            <div>

                            <label htmlFor="payment_type">
                                <input type="radio"
                                    className=' mt-2'
                                    required
                                    name="payment_method"
                                    value = "cash"
                                    onChange={ (e)=>{
                                        setData('payment_type', e.target.value)
                                        console.log(data)
                                    }}
                                /> <span> By cash </span>
                                </label>
                                <br />
                                <label htmlFor="payment_type">
                                <input type="radio"
                                    className=' mt-2'
                                    required

                                    name="payment_method"
                                    value = "stripe"
                                    onChange={ (e)=>{
                                        setData('payment_type', e.target.value)
                                        console.log(data)
                                    }}
                                /> <span> By Stripe </span>
                                </label>

                            </div>


                        <div>
                            <button>
                                disabled = {processing}
                                    Buy Pizza
                            </button>
                        </div>

                         </div>



                  </form>

                </div>
            </div>



        </GuestLayoutTwo>
        </>
    );
};
export default Buy;
