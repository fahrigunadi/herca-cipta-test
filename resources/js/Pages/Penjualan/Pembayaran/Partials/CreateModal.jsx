import InputError from '@/Components/InputError'
import InputLabel from '@/Components/InputLabel'
import Modal from '@/Components/Modal'
import PrimaryButton from '@/Components/PrimaryButton'
import SecondaryButton from '@/Components/SecondaryButton'
import TextInput from '@/Components/TextInput'
import { useForm } from '@inertiajs/react'
import React, { useState } from 'react'

export default function CreateModalPembayaranPenjualan({ penjualan }) {
    const [show, setShow] = useState(false)

    const { data, setData, post, errors, processing } = useForm({
        amount_paid: '',
    });

    const handleOnClose = () => {
        setShow(false)
    }

    const submit = (e) => {
        e.preventDefault()

        post(route('penjualan.pembayaran.store', penjualan.id), {
            onSuccess: () => handleOnClose()
        })
    }

    return (
        <>
            <PrimaryButton onClick={() => setShow(true)} onClose={handleOnClose}>Buat Pembayaran</PrimaryButton>

            <Modal show={show} title="Tambah">
                <div className="p-6">
                    <h3 className="text-lg leading-6 font-medium text-gray-900">Create Pembayaran</h3>

                    <form onSubmit={submit} className="mt-6 space-y-6">
                        <div>
                            <InputLabel htmlFor="amount_paid" value="Amount Paid" />

                            <TextInput
                                id="amount_paid"
                                className="mt-1 block w-full"
                                value={data.amount_paid}
                                onChange={(e) => setData('amount_paid', e.target.value)}
                                required
                                isFocused
                                type="number"
                                autoComplete="amount_paid"
                            />

                            <InputError className="mt-2" message={errors.amount_paid} />
                        </div>

                        <div className="flex items-center gap-2">
                            <PrimaryButton disabled={processing}>Save</PrimaryButton>
                            <SecondaryButton onClick={handleOnClose}>Cancel</SecondaryButton>
                        </div>
                    </form>
                </div>
            </Modal>
        </>
    )
}
