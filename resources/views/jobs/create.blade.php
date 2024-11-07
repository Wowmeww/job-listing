<x-layout>
    <x-page-heading>Create Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input  label="Title" name="title" type="text" />
        <x-forms.input  label="Salary" name="salary" type="text" />
        <x-forms.input  label="Location" name="location" type="text" />

        <x-forms.select name="schedule" label="Schedule">
            <option value="Full Time" selected>Full Time</option>
            <option value="Part Time">Part Time</option>
        </x-forms.select>

        <x-forms.input  label="URL" name="url"  />

        <x-forms.checkbox label="Feature (cost extra)" name="featured" />

        <x-forms.divider />

        <x-forms.input  label="Tags (Comma separated)" name="tags" placeholder="tag_1, tag_2, tag_3"  />

        <x-forms.button>Create Job</x-forms.button>
    </x-forms.form>
</x-layout>
