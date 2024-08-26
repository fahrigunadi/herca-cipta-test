import InputError from '@/Components/InputError'
import InputLabel from '@/Components/InputLabel'
import Modal from '@/Components/Modal'
import PrimaryButton from '@/Components/PrimaryButton'
import SecondaryButton from '@/Components/SecondaryButton'
import TextInput from '@/Components/TextInput'
import { useForm } from '@inertiajs/react'
import React, { useState } from 'react'

export default function CreateModalMarketing() {
    const [show, setShow] = useState(false)

    const { data, setData, post, errors, processing } = useForm({
        name: '',
    });

    const handleOnClose = () => {
        setShow(false)
    }

    const submit = (e) => {
        e.preventDefault()

        post(route('marketing.store'), {
            onSuccess: () => handleOnClose()
        })
    }

    return (
        <>
            <PrimaryButton onClick={() => setShow(true)} onClose={handleOnClose}>Tambah Marketing</PrimaryButton>

            <Modal show={show} title="Tambah">
                <div className="p-6">
                    <h3 className="text-lg leading-6 font-medium text-gray-900">Create Marketing</h3>

                    <form onSubmit={submit} className="mt-6 space-y-6">
                        <div>
                            <InputLabel htmlFor="name" value="Name" />

                            <TextInput
                                id="name"
                                className="mt-1 block w-full"
                                value={data.name}
                                onChange={(e) => setData('name', e.target.value)}
                                required
                                isFocused
                                autoComplete="name"
                            />

                            <InputError className="mt-2" message={errors.name} />
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
