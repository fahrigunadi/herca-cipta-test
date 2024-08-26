import SecondaryButton from '@/Components/SecondaryButton'
import PrimaryButton from '@/Components/PrimaryButton'
import DangerButton from '@/Components/DangerButton'
import { router } from '@inertiajs/react'
import React, { useState } from 'react'
import Modal from '@/Components/Modal'

export default function DeleteModalMarketing({ item }) {
    const [show, setShow] = useState(false)
    const [processing, setProcessing] = useState(false)

    const handleOnClose = () => {
        setShow(false)
    }

    const submit = (e) => {
        e.preventDefault()

        setProcessing(true)

        router.delete(route('marketing.destroy', item.id), {
            onSuccess: () => handleOnClose(),
            onFinish: () => setProcessing(false),
        })
    }

    return (
        <>
            <DangerButton onClick={() => setShow(true)}>Delete</DangerButton>

            <Modal maxWidth="md" show={show}>
                <div className="p-6">
                    <h3 className="text-lg leading-6 font-medium text-gray-900">Delete Marketing</h3>

                    <form onSubmit={submit} className="mt-6 space-y-6">
                        <p>Are you sure you want to delete this marketing?</p>

                        <div className="flex items-center gap-2">
                            <PrimaryButton disabled={processing}>Yes, Delete</PrimaryButton>
                            <SecondaryButton onClick={handleOnClose}>Cancel</SecondaryButton>
                        </div>
                    </form>
                </div>
            </Modal>
        </>
    )
}
